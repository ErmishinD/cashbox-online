<?php

namespace App\Filters;
use Carbon\Carbon;


class ProductPurchaseFilter extends QueryFilter
{
    protected string $table_name = 'product_purchases';

    public function storage_id($value)
    {
        $this->builder->where('storage_id', $value);
    }

    public function product_type_id($value)
    {
        $this->builder->where('product_type_id', $value);
    }

    public function product_type_name($value)
    {
        $this->builder->whereHas('product_type', function($query) use ($value) {
            $query->where('name', 'like', '%' . $value . '%');
        });
    }

    public function user_id($value)
    {
        $this->builder->where('user_id', $value);
    }

    public function counterparty_id($value)
    {
        if (!$value) return;
        $this->builder->where('counterparty_id', $value);
    }

    public function transfer_id($value) {
        if (is_null($value)) {
            return $this->builder->doesntHave('transfer');
        }
        
        $this->builder->whereHas('transfer', fn($q) => $q->where('id', $value));
    }

    public function created_at_range($value) {
        if (!$value) return;

        $i = 0;
        foreach ($value as $key => $date) {
            $value[$key] = Carbon::parse($date);
            if ($i % 2 == 0) {
                $value[$key] = $value[$key]->startOfDay();
            } else {
                $value[$key] = $value[$key]->endOfDay();
            }
            $i++;
        }
        $this->builder->whereBetween('created_at', $value);
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
