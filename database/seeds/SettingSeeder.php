<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany([
            'default_locale' => 'ar',
            'default_timezone' => 'Asia/Riyadh',
            'reviews_enabled' => true,
            'auto_approve_reviews' => true,
            'currency_code' => 'SAR',
            'currency_symbol' => 'ريال',
            'default_email' => 'admin@ecommerce.test',
            'site_logo' => '',
            'site_favicon' => '',
            'social_facebook' => '',
            'social_instagram' => '',
            'social_twitter' => '',
            'social_linkedin' => '',
            'google_analytics' => '',
            'stripe_payment_method' => '',
            'stripe_key' => '',
            'stripe_secret_key' => '',
            'paypal_payment_method' => '',
            'paypal_client_id' => '',
            'paypal_secret_id' => '',
            'search_engine' => 'mysql',
            'free_shipping' => '',
            'local_shipping' => '',
            'outer_shipping' => '',
            'translatable' => [
                'site_name' => 'Rezo Store',
                'site_title' => 'Rezo',
                'footer_copyright_text' => 'جميع الحقوق محفوظة',
                'seo_meta_title' => '',
                'seo_meta_description' => '',
            ],

        ]);
    }
}
