<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promo;
use Faker\Generator as Faker;

$factory->define(Promo::class, function (Faker $faker) {
    return [
        "name" => $faker->randomElement(["B1", "B2", "B3", "M1", "M2"]),
        "speciality" => $faker->randomElement(["Computer Science", "3D", "Design", "audiovisual", "Marketing"])
    ];
});
