<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
                [
                    'id' => 1,
                    'name' => 'Pizza',
                    'sort_id' => 0,
                ],
                [
                    'id' => 2,
                    'name' => 'Salad',
                    'sort_id' => 0,
                ]]
        );
    }
}
