<?php

namespace App\Models;

use App\Models\Traits\IsSortable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use IsSortable;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
