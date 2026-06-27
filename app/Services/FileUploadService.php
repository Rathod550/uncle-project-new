<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FileUploadService
{
    public static function uploadFileOnPublic($file, $path)
    {
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->storeAs($path, $fileName, 'public_path');

        if (str_starts_with($file->getMimeType(), 'image/')) {
            $thumbnailPath = $path . '/thumbnails';
            $thumbnailName = $fileName;

            $manager = new ImageManager(new Driver());
            
            $image = $manager->read($file)->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            if (!file_exists(public_path($thumbnailPath))) {
                mkdir(public_path($thumbnailPath), 0755, true);
            }

            $image->save(public_path($thumbnailPath . '/' . $thumbnailName));
        }

        return $fileName;
    }
}