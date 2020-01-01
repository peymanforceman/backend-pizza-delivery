<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'full_name' => 'Test User',
            'address' => 'Test User Address',
            'phone' => '+1-222-3454',
            'email' => 'test@test.com',
            'password' => bcrypt('test123'),
        ]);
    }
}
