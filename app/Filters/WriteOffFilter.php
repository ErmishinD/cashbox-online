<?php

namespace App\Filters;


class WriteOffFilter extends QueryFilter
{
    public function user_id($value)
    {
        $this->builder->where('user_id', $value);
    }

    public function storage_id($value)
    {
        $this->builder->where('storage_id', $value);
    }

    public function product_type_id($value)
    {
        $this->builder->where('product_type_id', $value);
    }

    public function sort_by_created_at($direction)
    {
        $this->builder->orderBy('created_at', $direction);
    }
}
