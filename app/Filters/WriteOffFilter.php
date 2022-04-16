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
}
