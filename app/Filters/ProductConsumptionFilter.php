<?php

namespace App\Filters;


class ProductConsumptionFilter extends QueryFilter
{
    protected string $table_name = 'product_consumptions';

    public function storage_id($value)
    {
        $this->builder->where('storage_id', $value);
    }

    public function consumable_type($value)
    {
        if (!$value) return;

        $this->builder->where('consumable_type', $value);
    }

    public function product_purchase_id($value)
    {
        if (!$value) return;

        $this->builder->where('product_purchase_id', $value);
    }
}
