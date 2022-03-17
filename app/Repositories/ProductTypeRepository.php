<?php

namespace App\Repositories;

use App\Models\ProductType;
use App\Services\EnumDbCol;
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
        $product_types = $this->model->select('id', 'name', 'company_id', 'base_measure_type_id', 'main_measure_type_id', 'photo', 'type')
            ->with('base_measure_type')
            ->with('main_measure_type')
            ->with(['measure_types' => function ($query) {
                $query->orderBy('quantity');
            }])
            ->onlyInCompany()
            ->filter($filters)
            ->get()
            ->each(function ($product_type) {
                $product_type->measure_types->prepend($product_type->main_measure_type);

                $product_type->base_measure_type->quantity = 1;
                $product_type->base_measure_type->description = '';
                $product_type->measure_types->push($product_type->base_measure_type);

                $product_type->measure_types = $product_type->measure_types->unique('quantity')->sortByDesc('quantity');
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
        $product_type = parent::create($data);
        if (!empty($data['measure_types'])) {
            $product_type->measure_types()->attach($data['measure_types']);
        }
        return $product_type;
    }

    public function update($product_type, $data)
    {
        $product_type->update($data);

        if (!empty($data['measure_types'])) {
            $product_type->measure_types()->sync($data['measure_types']);
        }
        return $product_type;
    }

    public function remove_measure_types($data): void
    {
        $product_type = $this->model->find($data['product_type_id']);
        $product_type->measure_types()->detach($data['measure_types']);
    }

    public function get_paginated($paginate_data, $filters)
    {
        return $this->model
            ->onlyInCompany()
            ->filter($filters)
            ->paginate($paginate_data['per_page'], ['*'], 'page', $paginate_data['page']);
    }
}
