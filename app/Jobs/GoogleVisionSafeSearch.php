<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\AnnotateImageRequest;
use Google\Cloud\Vision\V1\BatchAnnotateImagesRequest;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Feature\Type;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Google\Cloud\Vision\V1\Image as VisionImage;
use Illuminate\Support\Facades\Log;
use Throwable;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    private $article_image_id;

    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {

            $i = Image::find($this->article_image_id);
            if (!$i) {

                Log::warning('Image not found', ['image_id' => $this->article_image_id]);
                return;
            }

            $path = storage_path('app/public/' . $i->path);

            if (!file_exists($path)) {
                throw new \Exception("File not found: {$path}");
            }

            $image = file_get_contents($path);
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

            $googleVisionClient = new ImageAnnotatorClient();
            $google_image = new VisionImage(['content' => $image]);

            $google_feature = new Feature();
            $google_feature->setType(Type::SAFE_SEARCH_DETECTION);

            $request = new AnnotateImageRequest();
            $request->setImage($google_image);
            $request->setFeatures([$google_feature]);

            $batchRequest = new BatchAnnotateImagesRequest();
            $batchRequest->setRequests([$request]);

            $responseBatch = $googleVisionClient->batchAnnotateImages($batchRequest);

            $response = $responseBatch->getResponses();

            if(empty($response)){
                throw new \Exception('Empty response from Google Vision');
            }

            if(!$response[0]->getSafeSearchAnnotation()){
                throw new \Exception('SafeSearchAnnotation missing');
            }

            $googleVisionClient->close();

            $safeSearchAnnotation = $response[0]->getSafeSearchAnnotation();
            $adult = $safeSearchAnnotation->getAdult();
            $spoof = $safeSearchAnnotation->getSpoof();
            $medical = $safeSearchAnnotation->getMedical();
            $violence = $safeSearchAnnotation->getViolence();
            $racy = $safeSearchAnnotation->getRacy();

            $likeliHoodName = [
                'text-secondary bi bi-circle-fill',
                'text-success bi bi-check-circle-fill',
                'text-success bi bi-check-circle-fill',
                'text-warning bi bi-exclamation-circle-fill',
                'text-warning bi bi-exclamation-circle-fill',
                'text-danger bi bi-dash-circle-fill',
            ];

            $i->adult = $likeliHoodName[$adult];
            $i->spoof = $likeliHoodName[$spoof];
            $i->medical = $likeliHoodName[$medical];
            $i->violence = $likeliHoodName[$violence];
            $i->racy = $likeliHoodName[$racy];

            $i->save();
        } catch (Throwable $e) {

            Log::error('GoogleVisionSafeSearch FAILED', [
                'image_id' => $this->article_image_id,
                'message'  => $e->getMessage(),
                'file'     => $e->getFile(),
                'line'     => $e->getLine(),
            ]);

            throw $e;
        }
    }
}
