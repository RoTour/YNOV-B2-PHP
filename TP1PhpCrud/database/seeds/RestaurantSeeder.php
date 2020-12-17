<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('addresses')->delete();
    DB::table('restaurants')->delete();
    factory(\App\Restaurant::class, 20)->create()->each(function ($restaurant) {
      $restaurant->save();

      $faker = Faker\Factory::create();

      DB::table('addresses')->insert(
        [
          "restaurant_id" => $restaurant->id,
          "address" => $faker->streetAddress,
          "city" => $faker->city,
          "postal" => $faker->randomNumber(5, true)
        ]
      );
      for ($i = 0; $i < 2; $i++) {
        DB::table('employees')->insert(
          [
            "restaurant_id" => $restaurant->id,
            "firstname" => $faker->firstName,
            "lastname" => $faker->lastName
          ]
        );
      }
    });
  }
}
