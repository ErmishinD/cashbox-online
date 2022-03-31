<?php

namespace App\Services;


use App\Models\ProductPurchase;

class ShopService
{
    public static function has_products_in_storages($shop): bool
    {
        $storages = $shop->storages->pluck('id');
        $product_purchases = $product_purchases = ProductPurchase::whereIn('storage_id', $storages)
            ->where('current_quantity', '>', 0)->count();
        return $product_purchases > 0;
    }
}


