<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

        return view('admin.settings.shipping.edit', with([
            'shipping' => $shippingMethod
        ]));
    }
    public function updateShippingMethods(ShippingRequest $request )
    {


        try {

            DB::beginTransaction();
            $shipping = Setting::find($request->id);
            $shipping->update(['plain_value'=>$request->plain_value]);

            // save translations
            $shipping->value = $request->value;
            $shipping->save();

            DB::commit();
            return  redirect()->back()->with([
                'success' => 'تم التحديث بنجاح'
            ]);
        }catch (\Exception $ex){
            return  redirect()->back()->with([
                'error' => 'العملية لم تتم يرجى المحاولة لاحقاً'
            ]);
            DB::rollback();
        }




    }

}
