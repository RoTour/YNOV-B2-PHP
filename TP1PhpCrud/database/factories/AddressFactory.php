<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
  return [
    "address" => $faker->streetAddress,
    "city" => $faker->city,
    "postal" => $faker->randomNumber(5, true)
  ];
});
