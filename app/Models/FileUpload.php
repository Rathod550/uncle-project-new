<?php 
namespace App\Model;

use Image;
use File;
use Storage;

class FileUpload
{
    public static function uploadStorage($path, $image)
    {
        $imageName = time().'_'.preg_replace('/\s+/','',$image->getClientOriginalName());
        $image->move(storage_path('app/public'.$path),$imageName);

        $extension = $image->getClientOriginalExtension();

        // if($extension == "jfif" || $extension == "jpeg" || $extension == "jpg" || $extension == "png" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG"){

        //     // create thumbnail image
        //     $orgImagePath = storage_path('app/public'.$path.'/'.$imageName);
        //     $thumbnailImgPath = storage_path('app/public'.$path.'/thumbnail/'.$imageName);
            
        //     // if thumbnail folder not create then first create folder
        //     $thumbnailFolderPath = storage_path('app/public'.$path.'/thumbnail');
        //     if(!File::exists($thumbnailFolderPath)) {
        //         File::makeDirectory($thumbnailFolderPath, $mode = 0755, true, true);
        //     }

        //     Image::make($orgImagePath)->resize(200, 200)->save($thumbnailImgPath);
        // }
        
        return $imageName;
    }
    public static function uploadLocalPublic($path, $image,$isGenerateThumbnail=0)
    {
        $imageName = time().'_'.preg_replace('/\s+/','',$image->getClientOriginalName());
        $image->move(public_path($path),$imageName);

        $extension = $image->getClientOriginalExtension();

        if($isGenerateThumbnail == 1 && ($extension == "jfif" || $extension == "jpeg" || $extension == "jpg" || $extension == "png" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG")){

            // create thumbnail image
            $orgImagePath = public_path($path.'/'.$imageName);
            $thumbnailImgPath = public_path($path.'/thumbnail/'.$imageName);
            
            // if thumbnail folder not create then first create folder
            $thumbnailFolderPath = public_path($path.'/thumbnail');
            if(!File::exists($thumbnailFolderPath)) {
                File::makeDirectory($thumbnailFolderPath, $mode = 0755, true, true);
            }

           // Image::make($orgImagePath)->resize(200, 200)->save($thumbnailImgPath);
        }
        
        return $imageName;
    }
}
