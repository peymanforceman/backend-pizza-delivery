<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db_row = DB::table('orders')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'full_name' => 'Test User',
                'address' => 'Test User Address',
                'phone' => '+1-222-3454',
                'coupon' => null,
                'delivery_fee' => 2.00,
                'status' => 0,
                'total_price' => 18.00,
                'final_price' => 20.00,
            ]
        ]);

        DB::table('order_carts')->insert([
            [
                'order_id' => 1,
                'product_id' => 1,
                'name' => 'Pizza Margeritha',
                'count' => 3,
                'price' => 18,
            ]
        ]);
    }
}
