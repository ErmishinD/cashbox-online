<?php

namespace App\Repositories;

use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\Storage;
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
        $product_purchases = $this->model->with(['product_type.main_measure_type', 'base_measure_type'])
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
}
