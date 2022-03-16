<?php

namespace App\Filters;


class ProductPurchaseFilter extends QueryFilter
{
    public function storage_id($value)
    {
        $this->builder->where('storage_id', $value);
    }

    public function product_type_id($value)
    {
        $this->builder->where('product_type_id', $value);
    }


    public function sort_by_cost($direction)
    {
        $this->builder->orderBy('cost', $direction);
    }

    public function sort_by_expiration_date($direction)
    {
        $this->builder->orderBy('expiration_date', $direction);
    }

    public function sort_by_created_at($direction)
    {
        $this->builder->orderBy('created_at', $direction);
    }


}