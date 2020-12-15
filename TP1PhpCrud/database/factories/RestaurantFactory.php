<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "website" => $faker->url,
        "description" => $faker->text,
        "type" => $faker->randomElement(["Kebab", "Tacos", "Italian", "Asian", "Fast-Food"]),
        "state" => $faker->randomElement(["Open", "Closed", "UnderConstruction"]),
    ];
});
