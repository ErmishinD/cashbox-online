<?php

namespace App\Repositories;

use App\Models\ProductPurchase;
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
        $product_purchases = $this->model->with(['product_type.main_measure_type', 'measure_type'])
            ->whereIn('storage_id', $storage_ids)
            ->get()->groupBy('product_type.id');
        return $product_purchases;
    }
}
