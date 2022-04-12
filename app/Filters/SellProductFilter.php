<?php

namespace App\Filters;


class SellProductFilter extends QueryFilter
{
    public function name($value)
    {
        $this->builder->where('name', 'like', "%$value%");
    }

    public function has_discount($value)
    {
        if ($value == 'true')
            $value = true;
        elseif ($value == 'false')
            $value = false;
        else
            return;
        $this->builder->where('has_discount', $value);
    }

    public function category_id($value)
    {
        if (!$value) {
            $this->builder->whereNull('category_id');
            return;
        }

        $this->builder->where('category_id', $value);
    }

    public function sort_by_name($direction)
    {
        $this->builder->orderBy('name', $direction);
    }

    public function sort_by_price($direction)
    {
        $this->builder->orderBy('price', $direction);
    }
}
