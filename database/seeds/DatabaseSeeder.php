<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminSeeder::class);
         $this->call(SettingSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(BrandSeeder::class);
         $this->call(TagSeeder::class);
         $this->call(ProductSeeder::class);
         $this->call(ProductCategoriesSeeder::class);
         $this->call(ProductAttributesSeeder::class);
         $this->call(ProductOptionSeeder::class);
         $this->call(ProductTagsSeeder::class);
         $this->call(UserSeeder::class);
    }
}
