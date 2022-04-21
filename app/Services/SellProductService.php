<?php

namespace App\Services;


class SellProductService
{
    public static function get_cost_price($sell_product)
    {
        $cost_price = 0;
        foreach ($sell_product->product_types as $product_type) {
            $product_purchase = $product_type->product_purchases->sortBy('id')->first();
            if ($product_purchase) {
                $cost_price += $product_type->pivot->quantity * ProductPurchaseService::get_price_per_unit($product_purchase);
            }
        }
        return round($cost_price, 2);
    }
}


