<?php

namespace App\Repositories;

use App\Models\ProductPurchase;
use App\Models\ProductType;
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

    public function getWithProductTypes(int $id)
    {
        $storage = $this->model->find($id);

        $product_types = ProductType::query()
            ->with(['media', 'main_measure_type', 'product_purchases' => function ($query) use ($id) {
                return $query->select('id', 'product_type_id', 'storage_id', 'quantity', 'current_quantity')->where('storage_id', $id);
            }])
            ->get();

        $storage->product_types = $product_types;
        return $storage;
    }

    public function deleteById($id): bool
    {
        $product_purchases = ProductPurchase::where('storage_id', $id)->where('current_quantity', '>', 0)->count();
        if ($product_purchases > 0) {
            return false;
        }
        return parent::deleteById($id);
    }

    public function getForSelect($company_id)
    {
        $shops_with_storages = Shop::select('id', 'company_id', 'name')
            ->with(['storages' => function ($query) {
                $query->select('id', 'name', 'shop_id');
            }])
            ->where('company_id', $company_id)
            ->get();
        return $shops_with_storages;
    }
}
