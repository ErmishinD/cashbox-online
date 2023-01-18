<?php

namespace App\Filters;


use App\Models\Category;

class ProductTypeFilter extends QueryFilter
{
    protected string $table_name = 'product_types';

    public function name($value)
    {
        $this->builder->where('name', 'like', "%$value%");
    }

    public function type($value)
    {
        if (!$value)
            return;
        $this->builder->where('type', $value);
    }

    public function base_measure_type_id($value)
    {
        if (!$value)
            return;
        $this->builder->where('base_measure_type_id', $value);
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

    public function sort_by_category_id($direction)
    {
        $this->builder->orderBy('category_id', $direction);
    }
}
