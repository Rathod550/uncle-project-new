<?php

use Carbon\Carbon;
use App\Models\FrontSetting;

/**
 * Write code on Method
 *
 * @return response()
 */
if (!function_exists('imageUpload')) {
    function imageUpload($file, $path)
    {
        $imageName = $file->getClientOriginalName();
        $file->storeAs($path, $imageName, 'public_path');
        return $imageName;
    }
}

/**
 * Write code on Method
 *
 * @return response()
 */
function makeSlug($name){
    $slug = Str::slug($name);
    return $slug;
}

/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertYmdToMdy')) {
    function convertYmdToMdy($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('M d,Y');
    }
}
  
/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertMdyToYmd')) {
    function convertMdyToYmd($date)
    {
        return Carbon::createFromFormat('m-d-Y H:i:s', $date)->format('Y-m-d');
    }
}

/**
 * Write code on Method
 *
 * @return response()
 */
if (!function_exists('getFrontSettingValue')) {
    function getFrontSettingValue($pageName)
    {
        $data = FrontSetting::where('page_name', $pageName)->get();
        $frontSetting = [];

        foreach($data as $key => $value){
            $frontSetting[$value->slug] = $value;
        }
        
        return $frontSetting;
    }
}

/**
 * Write code on Method
 *
 * @return response()
 */
function limitText($text, $limit)
{
    return Str::limit($text, $limit);
}