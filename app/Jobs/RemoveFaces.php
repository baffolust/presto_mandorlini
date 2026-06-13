<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\AnnotateImageRequest;
use Google\Cloud\Vision\V1\BatchAnnotateImagesRequest;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\Image as VisionImage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Support\Facades\Log;
use Spatie\Image\Enums\AlignPosition;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Image as SpatieImage;
use Throwable;


class RemoveFaces implements ShouldQueue
{
    use Queueable;

    public $tries = 5;
    public $backoff = 30;

    public function middleware(): array
    {
        return [
            new RateLimited('vision'),
        ];
    }


    protected $article_image_id;
    /**
     * Create a new job instance.
     */
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

            $src = storage_path('app/public/' . $i->path);

            if (!file_exists($src)) {
                throw new \Exception("File not found: {$src}");
            }

            $image = file_get_contents($src);
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

            $googleVisionClient = new ImageAnnotatorClient();
            $google_image = new VisionImage(['content' => $image]);

            $google_feature = new Feature();
            $google_feature->setType(Type::FACE_DETECTION);

            $request = new AnnotateImageRequest();
            $request->setImage($google_image);
            $request->setFeatures([$google_feature]);

            $batchRequest = new BatchAnnotateImagesRequest();
            $batchRequest->setRequests([$request]);

            $responseBatch = $googleVisionClient->batchAnnotateImages($batchRequest);

            $response = $responseBatch->getResponses();

            if (empty($response)) {
                throw new \Exception('Empty response from Google Vision');
            }

            $faces = $response[0]->getFaceAnnotations();



            if (!$faces) {
                throw new \Exception('FaceAnnotation missing');
            }

            $spatie_img = SpatieImage::load($src);

            foreach ($faces as $face) {

                $vertices = $face->getBoundingPoly()->getVertices();
                $bounds = [];
                foreach ($vertices as $vertex) {
                    $bounds[] = [$vertex->getX(), $vertex->getY()];
                }

                $w = $bounds[2][0] - $bounds[0][0];
                $h = $bounds[2][1] - $bounds[0][1];

                /* $image = SpatieImage::load($src); */

                $spatie_img->watermark(
                    base_path('resources/img/smile.png'),
                    AlignPosition::TopLeft,
                    paddingX: $bounds[0][0],
                    paddingY: $bounds[0][1],
                    width: $w,
                    height: $h,
                    fit: Fit::Stretch
                );
            }
            $spatie_img->save($src);

            $googleVisionClient->close();
        } catch (Throwable $e) {
            Log::error('RemoveFaces failed', [
                'image_id' => $this->article_image_id,
                'error' => $e->getMessage()
            ]);
        }
    }
}
