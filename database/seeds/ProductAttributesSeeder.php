<?php

use Illuminate\Database\Seeder;

class ProductAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('product_attributes')->delete();

        \DB::table('product_attributes')->insert(array(
            0 =>
                array(
                    'product_id' => 1,
                    'attribute_id' => 2,
                ),
            1 =>
                array(
                    'product_id' => 1,
                    'attribute_id' => 5,
                ),
            2 =>
                array(
                    'product_id' => 2,
                    'attribute_id' => 3,
                ),
            3 =>
                array(
                    'product_id' => 2,
                    'attribute_id' => 4,
                ),
            5 =>
                array(
                    'product_id' => 1,
                    'attribute_id' => 6,
                ),
            6 =>
                array(
                    'product_id' => 1,
                    'attribute_id' => 3,
                ),
        ));

    }
}
