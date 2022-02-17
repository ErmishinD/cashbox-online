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

    protected function getWithProductTypes()
    {
        $storage_builder = $this->model->with(['product_purchases' => function($query) {
            $query->with([
                'product_type' => function($query) {
                    $query->with('main_measure_type');
                },
                'base_measure_type']);
        }]);
        return $storage_builder;
    }

    public function getForShow(int $id) {
        $storage = $this->getWithProductTypes()->find($id);
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
