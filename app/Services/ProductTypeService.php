<?php

namespace App\Services;


class ProductTypeService
{
    public static function prepare_measure_types($product_type)
    {
        $product_type->measure_types->prepend($product_type->main_measure_type);

        $product_type->base_measure_type->quantity = 1;
        $product_type->base_measure_type->description = '';
        $product_type->measure_types->push($product_type->base_measure_type);

        $product_type->measure_types = $product_type->measure_types->unique('quantity')->sortByDesc('quantity');
        return $product_type;
    }

    public static function is_part_of_sell_products($product_type): bool
    {
        return $product_type->sell_products->count() > 0;
    }
}


