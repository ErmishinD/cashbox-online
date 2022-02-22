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
        $shop_id = $storage->shop_id;

        $product_purchases = collect();
        $product_purchases_transactions = collect();
        $parent_id = null;

        foreach ($data['product_types'] as $product_type) {
            $product_purchase_data = [
                'storage_id' => $data['storage_id'],
                'product_type_id' => $product_type['id'],
                'quantity' => $product_type['quantity'],
                'current_quantity' => $product_type['quantity'],
                'cost' => $product_type['cost'],
                'expiration_date' => $product_type['expiration_date'] ?? null
            ];
            $product_purchase = $this->model->create($product_purchase_data);
            $product_purchases->push($product_purchase);

            // create records in `cashbox`
            if ($product_purchases_transactions->isNotEmpty()) {
                $parent_id = $product_purchases_transactions->first()->id;
            }
            $cashbox_data = [
                'shop_id' => $shop_id,
                'data',
                'transaction_type' => Cashbox::TRANSACTION_TYPES['out'],
                'payment_type' => $data['payment_type'],
                'amount' => $product_type['cost'],
                'description' => $product_type['description'] ?? null,
                'operator_id' => Auth::user()->id,
                'parent_id' => $parent_id,
            ];
            $transaction = Cashbox::create($cashbox_data);
            $product_purchases_transactions->push($transaction);
        }

        return $product_purchases;
    }

    public function get_paginated($paginate_data, $filters)
    {
        $result = $this->model
            ->filter($filters)
            ->paginate($paginate_data['per_page'], ['*'], 'page', $paginate_data['page']);
        return $result;
    }
}
