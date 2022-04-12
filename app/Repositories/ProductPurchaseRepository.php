<?php

namespace App\Repositories;

use App\Models\Cashbox;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\Shop;
use App\Models\Storage;
use Illuminate\Support\Facades\Auth;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ProductPurchaseRepository.
 */
class ProductPurchaseRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return ProductPurchase::class;
    }

    public function getForDashboard(int $shop_id)
    {
        $storage_ids = Storage::select('id', 'shop_id')->where('shop_id', $shop_id)->get()->pluck('id');
        $product_purchases = $this->model->with(['product_type.main_measure_type'])
            ->whereIn('storage_id', $storage_ids)->where('current_quantity', '>', 0)
            ->get()->groupBy('product_type.id');

        $empty_product_types = ProductType::select('id', 'name', 'main_measure_type_id')
            ->with(['main_measure_type' => function($query) {
                $query->select('id', 'quantity');
            }])
            ->whereNotIn('id', $product_purchases->keys())
            ->get();

        $product_purchases->empty_product_types = $empty_product_types;

        return $product_purchases;
    }

    public function mass_create($data)
    {
        $storage = Storage::find($data['storage_id']);

        $product_purchases = collect();
        $parent_id = null;

        foreach ($data['product_types'] as $product_type) {
            $product_purchase_data = [
                'company_id' => $storage->company_id,
                'storage_id' => $data['storage_id'],
                'product_type_id' => $product_type['id'],
                'quantity' => $product_type['quantity'],
                'current_quantity' => $product_type['quantity'],
                'cost' => $product_type['cost'],
                'expiration_date' => $product_type['expiration_date'] ?? null,
                'user_id' => $data['user_id']
            ];
            $product_purchase = $this->model->create($product_purchase_data);
            $product_purchases->push($product_purchase);
        }

        return $product_purchases;
    }

    public function get_paginated($paginate_data, $filters)
    {
        $result = $this->model
            ->with(['product_type.main_measure_type', 'storage', 'user'])
            ->filter($filters)
            ->get()
            ->paginate($paginate_data['per_page'], $paginate_data['page']);
        return $result;
    }
}
