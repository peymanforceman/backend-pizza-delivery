<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fees')->insert([
            [
                'id' => 1,
                'distance' => 100,
                'price' => 2,
            ]
        ]);
    }
}
