<?php

namespace App\Filters;


class SystemLogFilter extends QueryFilter
{
    public function user_id($value)
    {
        $this->builder->where('user_id', $value);
    }

    public function action($value)
    {
        $this->builder->where('action', $value);
    }
}
