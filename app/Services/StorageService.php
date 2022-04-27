<?php

namespace App\Services;


use App\Models\Storage;

class StorageService
{
    public static function get_storages_balances(?array $storageIds)
    {
        $storages = Storage::query()
            ->when($storageIds, function ($query) use ($storageIds) {
                $query->whereIn('id', $storageIds);
            })
            ->withSum('product_purchases', 'current_cost')
            ->get();
        return $storages;
    }

    public static function get_storages_product_type_quantity($product_type_id)
    {
        $result = Storage::query()
            ->withSum(['product_purchases AS current_quantity' => function ($query) use ($product_type_id) {
                $query->where('product_type_id', $product_type_id)
                    ->where(function ($sub_query) {
                        $sub_query->whereNull('expiration_date')->orWhere('expiration_date', '>', now());
                    });
            }], 'current_quantity')
            ->withSum(['product_purchases AS current_cost' => function ($query) use ($product_type_id) {
                $query->where('product_type_id', $product_type_id)
                    ->where(function ($sub_query) {
                        $sub_query->whereNull('expiration_date')->orWhere('expiration_date', '>', now());
                    });
            }], 'current_cost')
            ->withSum(['product_purchases AS expired_current_quantity' => function ($query) use ($product_type_id) {
                $query->where('product_type_id', $product_type_id)
                    ->where(function ($sub_query) {
                        $sub_query->whereNotNull('expiration_date')->where('expiration_date', '<=', now());
                    });
            }], 'current_quantity')
            ->withSum(['product_purchases AS expired_current_cost' => function ($query) use ($product_type_id) {
                $query->where('product_type_id', $product_type_id)
                    ->where(function ($sub_query) {
                        $sub_query->whereNotNull('expiration_date')->where('expiration_date', '<=', now());
                    });
            }], 'current_cost')
            ->get();
        return $result;
    }
}


