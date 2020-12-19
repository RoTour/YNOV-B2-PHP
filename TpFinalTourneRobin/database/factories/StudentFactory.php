<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    $firstname = $faker->firstName;
    $lastname = $faker->lastName;
    return [
        "promo_id" => "".random_int(1,10),
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $firstname.$lastname."@ynov.com"
    ];
});
