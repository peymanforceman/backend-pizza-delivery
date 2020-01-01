<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait IsSortable
{
    public function scopeSorted(Builder $builder, $column = 'sort_id', $direction = 'asc')
    {
        $builder->orderBy($column, $direction);
    }
}
