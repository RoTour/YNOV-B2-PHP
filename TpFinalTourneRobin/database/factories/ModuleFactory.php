<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Module;
use Faker\Generator as Faker;

$factory->define(Module::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(["Laravel", "Android", "Iot", "C++","Javascript"]),
        'description' => $faker->text
    ];
});
