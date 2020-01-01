<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'address',
        'phone',
        'coupon',
        'discount',
        'status',
        'delivery_fee',
        'total_price',
        'final_price',
    ];

    public function order_carts()
    {
        return $this->hasMany('App\Models\OrderCart');
    }
}
