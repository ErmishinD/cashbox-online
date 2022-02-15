<?php

namespace App\Filters;


class ProductTypeFilter extends QueryFilter
{
    public function name($value)
    {
        $this->builder->where('name', 'like', "%$value%");
    }

    public function type($value)
    {
        if (!$value)
            return;
        $this->builder->where('type', $value);
    }

    public function sort_by_name($direction)
    {
        $this->builder->orderBy('name', $direction);
    }
}
