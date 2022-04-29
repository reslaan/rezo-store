<?php

use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('product_categories')->delete();

        \DB::table('product_categories')->insert(array(
            0 =>
                array(
                    'product_id' => 1,
                    'category_id' => 2,
                ),
            1 =>
                array(
                    'product_id' => 1,
                    'category_id' => 5,
                ),
            2 =>
                array(
                    'product_id' => 2,
                    'category_id' => 3,
                ),
            3 =>
                array(
                    'product_id' => 2,
                    'category_id' => 4,
                ),
            5 =>
                array(
                    'product_id' => 1,
                    'category_id' => 6,
                ),
            6 =>
                array(
                    'product_id' => 1,
                    'category_id' => 3,
                ),
        ));

    }
}
