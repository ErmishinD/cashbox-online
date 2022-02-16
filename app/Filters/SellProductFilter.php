<?php

namespace App\Filters;


class SellProductFilter extends QueryFilter
{
    public function name($value)
    {
        $this->builder->where('name', 'like', "%$value%");
    }

    public function sort_by_name($direction)
    {
        $this->builder->orderBy('name', $direction);
    }
}
