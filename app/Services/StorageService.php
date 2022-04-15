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
}


