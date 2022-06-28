<?php

namespace App\Filters;


class SystemLogFilter extends QueryFilter
{
    protected string $table_name = 'system_logs';

    public function user_id($value)
    {
        $this->builder->where('user_id', $value);
    }

    public function action($value)
    {
        $this->builder->where('action', $value);
    }
}
