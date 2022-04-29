<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Option;
use Faker\Generator as Faker;

$factory->define(Option::class, function (Faker $faker) {
    return [
        'name'      => $faker->word(),
        'attribute_id'      => factory(\App\Models\Attribute::class),
    ];
});
