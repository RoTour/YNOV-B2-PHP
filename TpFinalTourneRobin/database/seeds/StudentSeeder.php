<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(\App\Student::class, 20)->create()->each(function ($item) {
            $item->save();
        });
    }
}
