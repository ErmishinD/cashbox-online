<?php

namespace App\Filters;


class ProductTypeFilter extends QueryFilter
{
    public function name($value)
    {
        $this->builder->where('name', 'like', "%$value%");
    }
}
