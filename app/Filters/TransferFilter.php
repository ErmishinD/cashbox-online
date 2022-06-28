<?php

namespace App\Filters;


use App\Models\ProductPurchase;
use App\Models\ProductType;

class TransferFilter extends QueryFilter
{
    protected string $table_name = 'transfers';

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

    public function product_type_name($value)
    {
        $product_type = ProductType::where('name', $value)->first();
        $product_purchases = ProductPurchase::where('product_type_id', $product_type->id)->pluck('id');
        $this->builder->whereIn('product_purchase_id', $product_purchases);
    }

    public function sort_by_created_at($direction)
    {
        $this->builder->orderBy('created_at', $direction);
    }
}
