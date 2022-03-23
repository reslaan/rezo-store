<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function editShippingMethods($type){

        // shipping = free , local , outer
        if ($type === 'free')
            $shippingMethod = Setting::where('key','free_shipping_label')->first();
        else if ($type === 'local')
            $shippingMethod = Setting::where('key','local_label')->first();
        else if ($type === 'outer')
            $shippingMethod = Setting::where('key','outer_label')->first();
        else
            $shippingMethod = Setting::where('key','free_shipping_label')->first();

        return $shippingMethod;
    }
}
