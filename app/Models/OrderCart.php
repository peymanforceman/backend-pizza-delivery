<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderCart extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'count',
        'price',
    ];
}
