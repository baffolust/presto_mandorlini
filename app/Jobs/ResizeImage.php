<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Image;
use Throwable;

class ResizeImage implements ShouldQueue
{
    use Queueable;

    private $w;
    private $h;
    private $filename;
    private $path;

    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->filename = basename($filePath);
        $this->h = $h;
        $this->w = $w;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        try {

            $base = storage_path('app/public');

            $srcPath = $base . '/' . $this->path . '/' . $this->filename;

            $destPath = $base . '/' . $this->path . '/crop_' . $w . 'x' . $h . '_' . $this->filename;

          /*   $srcPath = storage_path() . 'app/public' . $this->path . '/' . $this->filename;
            $destPath = storage_path() . 'app/public' . $this->path . "crop_{$w}x{$h}_" . $this->filename; */

            Log::info('ResizeImage job started', [
                'src' => $srcPath,
                'exists' => file_exists($srcPath),
                'dest' => $destPath,
            ]);

            Image::load($srcPath)->crop($w, $h, CropPosition::Center)->save($destPath);
        } catch (Throwable $e) {
            Log::error('ResizeImage job FAILED', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            throw $e;
        }
    }
}
