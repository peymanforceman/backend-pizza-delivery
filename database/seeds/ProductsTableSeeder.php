<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
                [
                    'id' => 1,
                    'category_id' => 1,
                    'name' => 'Pizza Margeritha',
                    'description' => 'Tomaat, kaasi.',
                    'price' => 6,
                    'sort_id' => 0,
                ],
                [
                    'id' => 2,
                    'category_id' => 1,
                    'name' => 'Pizza Salami',
                    'description' => 'Tomatoes, mozzarella, spicy Italian salami.',
                    'price' => 4,
                    'sort_id' => 0,
                ],
                [
                    'id' => 3,
                    'category_id' => 1,
                    'name' => 'Pizza Hawai',
                    'description' => 'Tomatensaus, mozzarella kaas, ham en ananas.',
                    'price' => 5,
                    'sort_id' => 0,
                ],
                [
                    'id' => 4,
                    'category_id' => 1,
                    'name' => 'Pizza Vegetariana',
                    'description' => 'Tomatensaus, mozzarellakaas, paprika.',
                    'price' => 6,
                    'sort_id' => 0,
                ],
                [
                    'id' => 5,
                    'category_id' => 1,
                    'name' => 'Pizza Mexicano',
                    'description' => 'Tomatensaus, mozzarella kaas, salami en paprika.',
                    'price' => 7,
                    'sort_id' => 0,
                ],
                [
                    'id' => 6,
                    'category_id' => 2,
                    'name' => 'Pasta Salade',
                    'description' => 'Pasta,Salad',
                    'price' => 8,
                    'sort_id' => 0,
                ],
                [
                    'id' => 7,
                    'category_id' => 2,
                    'name' => 'Pasta Pollo',
                    'description' => 'Tomatensaus, kipshoarma, verse knoflook',
                    'price' => 9,
                    'sort_id' => 0,
                ],
                [
                    'id' => 8,
                    'category_id' => 2,
                    'name' => 'Healthy Salad',
                    'description' => 'Salad , Tomato and ...',
                    'price' => 10,
                    'sort_id' => 0,
                ]]
        );
    }
}
