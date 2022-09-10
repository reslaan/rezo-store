<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

function getFolder(){
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}


define('PAGINATION_COUNT', 10);


function uploadImage($image , $folder){
    $image->store($folder ,'s3');
    return $image->hashName();
}
function deleteImage($fileName , $folder){
    File::delete(public_path('storage/images/'.$folder.'/'.$fileName));
}

function imagePath($folder, $fileName){
   $path =  Storage::disk('s3')->url($folder.'/'.$fileName);
   return $path;
}
