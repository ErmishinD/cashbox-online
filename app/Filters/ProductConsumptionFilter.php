<?php

namespace App\Filters;


use App\Models\Cashbox;
use App\Models\Transfer;
use App\Models\WriteOff;
use Carbon\Carbon;

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

        if ($value == 'sell') {
            $value = Cashbox::class;
        } elseif ($value == 'writeoff') {
            $value = WriteOff::class;
        } elseif ($value == 'transfer') {
            $value = Transfer::class;
        }

        $this->builder->where('consumable_type', $value);
    }

    public function product_purchase_id($value)
    {
        if (!$value) return;

        $this->builder->where('product_purchase_id', $value);
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
}
