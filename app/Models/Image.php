<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;


class Image extends Model
{
    use HasFactory;

    /* protected $casts = [ 'labels' => 'array' ]; */

    protected $fillable = [
        'path'
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public static function getUrlByFilePath($filePath, $w = null, $h = null, $wm = false)
    {

        $path = dirname($filePath);
        $filename = basename($filePath);

        // Foto Originale
        if (!$w && !$h && !$wm) {
            return Storage::url($filePath);
        }

        // Watermark Only
        if (!$w && !$h && $wm==true) {
            $file = "{$path}/wm_{$filename}";
            return Storage::url($file);
        }

        // WM + Crop 
        if ($w && $h) {
            $file = "{$path}/crop_{$w}x{$h}_{$filename}";
            return Storage::url($file);
        }
    }

    public function getUrl($w = null, $h = null, $wm=false)
    {
        return self::getUrlByFilePath($this->path, $w, $h, $wm);
    }

    protected function casts(): array
    {
        return ['labels' => 'array'];
    }
}
