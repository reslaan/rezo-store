<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id'            => 1,
            'name'          => 'القسم الرئيسي',
            'slug'          => 'root',
            'is_active'     => 1,
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);
      // factory(\App\Models\Category::class,20)->create();
    }
}
