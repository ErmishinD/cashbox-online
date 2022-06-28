<?php

namespace App\Filters;


use App\Models\Category;

class SellProductFilter extends QueryFilter
{
    protected string $table_name = 'sell_products';

    public function name($value)
    {
        $this->builder->where('name', 'like', "%$value%");
    }

    public function has_discount($value)
    {
        if ($value == 'true')
            $value = true;
        elseif ($value == 'false')
            $value = false;
        else
            return;
        $this->builder->where('has_discount', $value);
    }

    public function category_id($value)
    {
        if (!$value) {
            return;
        } elseif ($value == 'without_category') {
            $this->builder->whereNull('category_id');
            return;
        }

        $this->builder->where('category_id', $value);
    }

    public function category_name($value)
    {
        if (!$value) {
            return;
        } elseif ($value == 'without_category') {
            $this->builder->whereNull('category_id');
            return;
        }

        $category = Category::where('name', 'like', '%' . $value . '%')->first();
        if (!$category) {
            return;
        }
        $this->builder->where('category_id', $category->id);
    }

    public function sort_by_name($direction)
    {
        $this->builder->orderBy('name', $direction);
    }

    public function sort_by_price($direction)
    {
        $this->builder->orderBy('price', $direction);
    }
}
