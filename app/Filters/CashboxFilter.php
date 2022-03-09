<?php

namespace App\Filters;


class CashboxFilter extends QueryFilter
{
    // Filtering

    public function shop_id($value)
    {
        $this->builder->where('shop_id', $value);
    }


    // Sorting

    public function sort_by_created_at($direction)
    {
        $this->builder->orderBy('created_at', $direction);
    }


}
