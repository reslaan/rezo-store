<?php

/** @var Factory $factory */

use App\Models\Brand;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name'      => $faker->word(),
        'photo'     => $faker->image(),
        'is_active' => $faker->boolean(),
    ];
});
