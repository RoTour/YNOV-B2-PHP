<?php

use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Ingredients::class,20)->create()->each(function ($ingredient) {
            $ingredient->save();
        });
    }
}
