<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable()->index();
            $table->string('full_name');
            $table->string('address');
            $table->string('phone');
            $table->string('coupon')->nullable();
            $table->smallInteger('discount')->unsigned()->default(0);
            $table->smallInteger('status')->unsigned()->default(0);
            $table->decimal('delivery_fee', 13, 2)->default(0);
            $table->decimal('total_price', 13, 2);// price without coupon codes and discounts and delivery fee
            $table->decimal('final_price', 13, 2);// price final user pays after coupon codes and discounts and delivery fee
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
