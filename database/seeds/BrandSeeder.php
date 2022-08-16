<?php

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'id' => 1,
            'name' => 'SAMSUNG',
            'is_active' => true,
        ]);
        Brand::create([
            'id' => 2,
            'name' => 'SONY',
            'is_active' => true,
        ]);
        Brand::create([
            'id' => 3,
            'name' => 'APPLE',
            'is_active' => true,
        ]);

    //    factory(\App\Models\Brand::class,10)->create();
    }
}
