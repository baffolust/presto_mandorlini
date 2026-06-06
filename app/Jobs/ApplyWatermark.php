<?php

namespace App\Jobs;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Spatie\Image\Enums\AlignPosition;
use Spatie\Image\Enums\Unit;
use Spatie\Image\Image;
use Throwable;

class ApplyWatermark implements ShouldQueue
{
    use Queueable;

    private $path;
    private $filename;
    /**
     * Create a new job instance.
     */
    public function __construct($filePath)
    {
        $this->path = dirname($filePath);
        $this->filename = basename($filePath);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $base = storage_path('app/public');

            $srcPath = $base . '/' . $this->path . '/' . $this->filename;

            $destPath = $base . '/' . $this->path . '/wm_' . $this->filename;

            Image::load($srcPath)->watermark(
                base_path('resources/img/watermark.png'),
                width: 80,
                height: 80,
                paddingX: 3,
                paddingY: 3,
                paddingUnit: Unit::Pixel,
                position: AlignPosition::Center
            )->save($destPath);
        } catch (Throwable $e) {
            Log::error('ApplyWatermark FAILED', [
                'message' => $e->getMessage(),
                'path' => $this->path,
                'filename' => $this->filename
            ]);

            throw $e;
        }
    }
}
