<?php

namespace App\Repositories;

use App\Models\ProductPurchase;
use App\Models\Shop;
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
                }]);
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

    public function getForSelect($company_id) {
        $shops_with_storages = Shop::select('id', 'company_id', 'name')
            ->with(['storages' => function($query) {
                $query->select('id', 'name', 'shop_id');
            }])
            ->where('company_id', $company_id)
            ->get();
        return $shops_with_storages;
    }
}
