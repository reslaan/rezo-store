<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'site_name' => ['sometimes','required','string'],
            'site_title' => ['sometimes','required','string'],
            'currency_code' => ['sometimes','required','string','max:3'],
            'currency_symbol' => ['sometimes','nullable','string','max:5'],
            'site_logo' => ['sometimes','nullable','mimes:jpeg,png'],
            'site_favicon' => ['sometimes','nullable','mimes:jpeg,png'],
            'footer_copyright_text' => ['sometimes','nullable','string','max:100'],
            'seo_meta_title' => ['sometimes','nullable','string','max:50'],
            'seo_meta_description' => ['sometimes','nullable','string','max:200'],
            'social_facebook' => ['sometimes','nullable','active_url','max:200'],
            'social_twitter' => ['sometimes','nullable','active_url','max:200'],
            'social_instagram' => ['sometimes','nullable','active_url','max:200'],
            'social_linkedin' => ['sometimes','nullable','active_url','max:200'],
            'google_analytics' => ['sometimes','nullable','string'],
            'stripe_payment_method' => ['sometimes','boolean'],
            'stripe_key' => ['sometimes','nullable','string'],
            'stripe_secret_key' => ['sometimes','required_with:stripe_key','nullable','string'],
            'paypal_payment_method' => ['sometimes','boolean'],
            'paypal_client_id' => ['sometimes','nullable','string'],
            'paypal_secret_id' => ['sometimes','required_with:paypal_client_id','nullable','string'],
            'free_shipping' => ['sometimes','nullable','numeric'],
            'local_shipping' => ['sometimes','nullable','numeric'],
            'outer_shipping' => ['sometimes','nullable','numeric'],
        ];
    }
}
