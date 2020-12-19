<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run() {
        factory(\App\Module::class, 5)->create()->each(function ($item) {
            $item->save();
        });
    }
}
