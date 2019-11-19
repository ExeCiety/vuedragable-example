<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('foods')->insert([
                'name' => Str::random(10),
            ]);
        }
    }
}
