<?php

use Illuminate\Support\Facades\File;

function getFolder(){
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}


define('PAGINATION_COUNT', 10);


function uploadImage($image , $folder){
    $image->store('public/images/'.$folder);
    return $image->hashName();
}
function deleteImage($fileName , $folder){
    File::delete(public_path('storage/images/'.$folder.'/'.$fileName));
}
