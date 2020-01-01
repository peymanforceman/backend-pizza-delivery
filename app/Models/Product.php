<?php

namespace App\Models;

use App\Models\Traits\IsSortable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use IsSortable;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
