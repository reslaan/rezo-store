<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\ShippingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SettingController extends BaseController
{

    public function index()
    {
        $this->setPageTitle(__('sidebar.settings'), null);
        return view('admin.settings.index');
    }

    public function update(SettingRequest $request)
    {
        if ($request->has('site_logo') || $request->has('site_favicon')) {
            if ($request->hasFile('site_logo')) {
                $site_logo = Setting::get('site_logo');
                if ($site_logo) {
                    // delete image from local storage
                    deleteImage($site_logo, 'settings');
                }
                // uploadImage store file in local storage and return file hash name
                $site_logo = uploadImage($request->site_logo, 'settings');
                Setting::set('site_logo', $site_logo);
            }
            if ($request->hasFile('site_favicon')) {
                $site_favicon = Setting::get('site_favicon');

                if ($site_favicon) {
                    // delete image from local storage
                    deleteImage($site_favicon, 'settings');
                }
                // uploadImage store file in local storage and return file hash name
                $site_favicon = uploadImage($request->site_favicon, 'settings');
                Setting::set('site_favicon', $site_favicon);
            }
        } else {
            $keys = $request->except('_token');
            foreach ($keys as $key => $value) {
                $setting = new Setting();
                $entry = $setting->where('key', $key)->first();
                // check if key has translation
                if ($entry->is_translatable) {
                    $entry->value = $value;
                } else {
                    $entry->plain_value = $value;
                }
                $entry->save();

            }
        }
//        return redirect()->back()->with([
//            'success' => 'settings updated'
//        ]);
        return $this->responseRedirectBack('Settings updated successfully.', 'success');

    }

    public function editShippingMethods($type)
    {

        // shipping = free , local , outer
        if ($type === 'free')
            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();
        else if ($type === 'local')
            $shippingMethod = Setting::where('key', 'local_label')->first();
        else if ($type === 'outer')
            $shippingMethod = Setting::where('key', 'outer_label')->first();
        else
            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();

        return view('admin.settings.shipping.edit', with([
            'shipping' => $shippingMethod
        ]));
    }

    public function updateShippingMethods(ShippingRequest $request)
    {


        try {

            DB::beginTransaction();
            $shipping = Setting::find($request->id);
            $shipping->update(['plain_value' => $request->plain_value]);

            // save translations
            $shipping->value = $request->value;
            $shipping->save();

            DB::commit();
            return redirect()->back()->with([
                'success' => 'تم التحديث بنجاح'
            ]);
        } catch (\Exception $ex) {
            return redirect()->back()->with([
                'error' => 'العملية لم تتم يرجى المحاولة لاحقاً'
            ]);
            DB::rollback();
        }


    }

}
