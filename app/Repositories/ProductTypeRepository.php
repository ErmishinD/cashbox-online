<?php

namespace App\Repositories;

use App\Models\ProductType;
use App\Models\Storage;
use App\Services\EnumDbCol;
use App\Services\ProductTypeService;
use App\Services\UploadFileService;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ProductTypeRepository.
 */
class ProductTypeRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return ProductType::class;
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        $enums = [];
        $enumKeys = EnumDbCol::getEnumValues($this->model->getTable(), 'type');

        foreach ($enumKeys as $k => $v) $enums[$k] = __($v);

        return $enums;
    }

    public function getForSelect($filters = null)
    {
        $product_types = $this->model->select('id', 'name', 'company_id', 'base_measure_type_id', 'main_measure_type_id', 'type')
            ->with('media')
            ->with('base_measure_type')
            ->with('main_measure_type')
            ->with(['measure_types' => function ($query) {
                $query->orderBy('quantity');
            }])
            ->filter($filters)
            ->get()
            ->each(function ($product_type) {
                $product_type = ProductTypeService::prepare_measure_types($product_type);
            });
        return $product_types;
    }

    public function getForShow($id)
    {
        $product_type = $this->model->with(['measure_types', 'sell_products'])->find($id);
        return $product_type;
    }

    public function create(array $data)
    {
        if (array_key_exists('photo', $data)) {
            $photo = $data['photo'];
            unset($data['photo']);
        }

        $product_type = parent::create($data);
        if (!empty($data['measure_types'])) {
            $product_type->measure_types()->attach($data['measure_types']);
        }
        if (!empty($photo)) {
            UploadFileService::save_photo($photo, $product_type);
        }
        return $product_type;
    }

    public function update($product_type, $data)
    {
        if (array_key_exists('photo', $data)) {
            if (!empty($data['photo'])) {
                UploadFileService::save_photo($data['photo'], $product_type);
            }
            unset($data['photo']);
        }

        $product_type->update($data);

        if (!empty($data['measure_types'])) {
            $product_type->measure_types()->sync($data['measure_types']);
        }
        return $product_type;
    }

    public function get_paginated($paginate_data, $filters)
    {
        return $this->model
            ->with('media', 'category')
            ->orderByDesc('created_at')
            ->filter($filters)
            ->paginate($paginate_data['per_page'], ['*'], 'page', $paginate_data['page']);
    }

    public function getForSelectForSellProduct()
    {
        return $this->model->select('id', 'name')->get();
    }

    public function get_for_dashboard(int $shop_id)
    {
        $storage_ids = Storage::select('id', 'shop_id')->where('shop_id', $shop_id)->pluck('id');

        $product_types = ProductType::query()
            ->with('main_measure_type')
            ->withSum(['product_purchases' => function ($query) use ($storage_ids) {
                $query
                    ->whereIn('storage_id', $storage_ids)
                    ->where(function ($q) {
                        $q->whereNull('expiration_date')
                            ->orWhere('expiration_date', '>', now(new \DateTimeZone('Europe/Kiev')));
                    });
            }], 'current_quantity')
            ->orderByDesc('product_purchases_sum_current_quantity')
            ->get();

        return $product_types;
    }
}
