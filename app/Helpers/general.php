<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

function getFolder(){
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}


define('PAGINATION_COUNT', 10);


function uploadImage($image , $folder){
  $path =  $image->storePublicly($folder ,'s3');

    return $path;
}
function deleteImage($fileName , $folder){
    File::delete(public_path('storage/images/'.$folder.'/'.$fileName));
}

function imagePath($fileName){
   $path =  Storage::disk('s3')->url($fileName);
   return $path;
}
