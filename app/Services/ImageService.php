<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageService
{
    private const MAX_WIDTH = 1600;

    private const JPEG_QUALITY = 82;
    private const PNG_COMPRESSION = 7;
    private const WEBP_QUALITY = 82;

    /**
     * Store an uploaded image into public/uploads/{directory},
     * return the web-relative path. The file is resized and compressed.
     */
    public function store(UploadedFile $file, string $directory): string
    {
        $extension = strtolower($file->getClientOriginalExtension());
        $filename = Str::random(40).'.'.$extension;
        $relativePath = 'uploads/'.$directory.'/'.$filename;
        $absolutePath = public_path($relativePath);

        $file->move(public_path('uploads/'.$directory), $filename);

        if (extension_loaded('gd')) {
            $this->optimize($absolutePath);
        }

        return $relativePath;
    }

    /**
     * Delete a stored image by its web-relative path.
     */
    public function delete(?string $relativePath): void
    {
        if (! $relativePath) {
            return;
        }

        $absolutePath = public_path($relativePath);

        if (File::exists($absolutePath)) {
            File::delete($absolutePath);
        }
    }

    private function optimize(string $path): void
    {
        $info = @getimagesize($path);

        if ($info === false) {
            return;
        }

        $mime = $info['mime'];
        $source = $this->createSource($mime, $path);

        if ($source === false || $source === null) {
            return;
        }

        $source = $this->fixOrientation($source, $path, $mime);
        $source = $this->resizeIfNeeded($source, $mime);

        $this->saveOptimized($source, $path, $mime);

        imagedestroy($source);
    }

    /**
     * @return \GdImage|resource|false
     */
    private function createSource(string $mime, string $path)
    {
        return match ($mime) {
            'image/jpeg' => imagecreatefromjpeg($path),
            'image/png' => imagecreatefrompng($path),
            'image/webp' => function_exists('imagecreatefromwebp') ? imagecreatefromwebp($path) : false,
            default => null,
        };
    }

    private function fixOrientation($image, string $path, string $mime)
    {
        if ($mime !== 'image/jpeg' || ! function_exists('exif_read_data')) {
            return $image;
        }

        $exif = @exif_read_data($path);
        $orientation = (int) ($exif['Orientation'] ?? 0);

        return match ($orientation) {
            3 => imagerotate($image, 180, 0),
            6 => imagerotate($image, -90, 0),
            8 => imagerotate($image, 90, 0),
            default => $image,
        };
    }

    private function resizeIfNeeded($image, string $mime)
    {
        $width = imagesx($image);
        $height = imagesy($image);

        if ($width <= self::MAX_WIDTH) {
            return $image;
        }

        $newHeight = (int) round($height * (self::MAX_WIDTH / $width));
        $resized = imagecreatetruecolor(self::MAX_WIDTH, $newHeight);

        $this->preserveTransparency($resized, $mime);

        imagecopyresampled(
            $resized,
            $image,
            0,
            0,
            0,
            0,
            self::MAX_WIDTH,
            $newHeight,
            $width,
            $height
        );

        imagedestroy($image);

        return $resized;
    }

    private function preserveTransparency($image, string $mime): void
    {
        if ($mime === 'image/png' || $mime === 'image/webp') {
            imagealphablending($image, false);
            imagesavealpha($image, true);
        }
    }

    private function saveOptimized($image, string $path, string $mime): void
    {
        match ($mime) {
            'image/jpeg' => imagejpeg($image, $path, self::JPEG_QUALITY),
            'image/png' => imagepng($image, $path, self::PNG_COMPRESSION),
            'image/webp' => function_exists('imagewebp') ? imagewebp($image, $path, self::WEBP_QUALITY) : false,
            default => null,
        };
    }
}
