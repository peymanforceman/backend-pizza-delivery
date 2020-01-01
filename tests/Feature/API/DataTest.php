<?php

namespace Tests\Feature\API;

use App\Models\Question;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DataTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_we_get_categories()
    {
        $this->artisan('db:seed');
        $this->json('GET', 'api/products')->assertJsonFragment([
            'name' => 'Pizza'
        ]);
    }

    public function test_if_we_get_products()
    {
        $this->artisan('db:seed');
        $this->json('GET', 'api/products')->assertJsonFragment([
            "name" => "Pizza Margeritha"
        ]);
    }

    public function test_if_we_get_products_sorted_by_sort_id_and_id()
    {
        $this->artisan('db:seed');
        $this->json('GET', 'api/products')->assertSeeInOrder([
            "Margeritha", 'Salami'
        ]);
    }

    public function test_if_we_get_delivery_fee()
    {
        $this->artisan('db:seed');
        $this->json('GET', 'api/delivery-fee')->assertSee("price");
    }

    public function test_login()
    {
        $this->artisan('db:seed');
        $response = $this->post('api/auth/sign-in', [
            'email' => 'test@test.com',
            'password' => 'test123'
        ]);
        $response->assertSee("token");
    }

    public function test_sign_up()
    {
        $this->artisan('db:seed');
        $response = $this->post('api/auth/sign-up', [
            'full_name' => 'test',
            'phone' => '09356334140',
            'address' => 'test address',
            'email' => 'test@test1.com',
            'password' => 'test123',
            'password_confirmation' => 'test123'
        ]);
        $response->assertSee("test");
    }

    public function test_get_user_info()
    {
        $this->artisan('db:seed');
        $user = User::first();
        $this->actingAs($user)->post('api/auth/me')->assertSee('email');
    }

    public function test_get_order_history()
    {
        $this->artisan('db:seed');
        $user = User::first();
        $this->actingAs($user)->post('api/user-history')->assertSee('final_price');
    }

    public function test_get_order_info()
    {
        $this->artisan('db:seed');
        $user = User::first();
        $this->actingAs($user)->post('api/order/1')->assertSee('final_price');
    }

    public function test_register_new_order()
    {
        $this->artisan('db:seed');
        $user = User::first();
        $this->actingAs($user)->post('api/order', [
            'full_name' => 'test',
            'phone' => '09356334140',
            'address' => 'test address',
            'cart' => '[{id:1,quantity:3}]',
        ])->assertSee('final_price');
    }
}
