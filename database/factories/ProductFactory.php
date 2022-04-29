<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Brand;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->paragraph(),
        'price' => $faker->numberBetween(10, 9000),
        'manage_stock' => false,
        'in_stock' => $faker->boolean(),
        'slug' => $faker->slug(),
        'sku' => $faker->unique()->word(),
        'brand_id' => factory(Brand::class),
        'is_active' => $faker->boolean(),
    ];
});
