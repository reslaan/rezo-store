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
            'supported_currencies' => ['SAR','USD'],
            'store_email' => 'admin@ecommerce.test',
            'search_engine' => 'mysql',
            'local_pickup_cost' => 0,
            'flat_rate_cost' => 0,
            'translatable' => [
                'store_name' => 'Rezo Store',
                'free_shipping_label' => 'Free Shipping',
                'local_label' => 'local Shipping',
                'outer_label' => 'outer Shipping',
            ],

        ]);
    }
}
