<?php

namespace App\Filters;


class CashboxFilter extends QueryFilter
{
    protected string $table_name = 'cashboxes';

    public function start_date($value)
    {
        if (!$value) return;
        $this->builder->where('cashboxes.created_at', '>=', $value);
    }

    public function end_date($value)
    {
        if (!$value) return;
        $this->builder->where('cashboxes.created_at', '<=', $value);
    }

    public function shop_id($value)
    {
        if (!$value) return;
        $this->builder->where('shop_id', $value);
    }

    public function payment_type($value)
    {
        if (!$value) return;
        $this->builder->where('payment_type', $value);
    }

    public function sell_product_id($value)
    {
        if (!$value) return;
        $this->builder->where('sell_product_id', $value);
    }

    public function operator_id($value)
    {
        if (!$value) return;
        $this->builder->where('operator_id', $value);
    }

    public function collector_id($value)
    {
        if (!$value) return;
        $this->builder->where('collector_id', $value);
    }

    public function sort_by_amount($direction)
    {
        $this->builder->orderBy('amount', $direction);
    }

    public function sort_by_self_cost($direction)
    {
        $this->builder->orderBy('self_cost', $direction);
    }

    public function sort_by_profit($direction)
    {
        $this->builder->orderBy('profit', $direction);
    }

    public function sort_by_created_at($direction)
    {
        $this->builder->orderBy('created_at', $direction);
    }
}
