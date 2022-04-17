<?php

namespace App\Filters;


class TransferFilter extends QueryFilter
{
    public function transferred_by($value)
    {
        $this->builder->where('transferred_by', $value);
    }

    public function from_storage_id($value)
    {
        $this->builder->where('from_storage_id', $value);
    }

    public function to_storage_id($value)
    {
        $this->builder->where('to_storage_id', $value);
    }
}
