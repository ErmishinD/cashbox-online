<?php

namespace App\Repositories;

use App\Models\ProductPurchase;
use App\Models\Storage;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class StorageRepository.
 */
class StorageRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Storage::class;
    }

    public function getForShow(int $id) {
        $storage = $this->model->with(['product_purchases' => function($query) {
            $query->with(['product_type', 'measure_type']);
        }])->find($id);
        $storage->product_purchases = $storage->product_purchases->groupBy('product_type.name');
        return $storage;
    }

    public function deleteById($id): bool
    {
        $product_purchases = ProductPurchase::where('storage_id', $id)->where('current_quantity', '>', 0)->get();
        if ($product_purchases->count() > 0) {
            return false;
        }
        return parent::deleteById($id);
    }
}
