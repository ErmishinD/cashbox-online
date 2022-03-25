<?php

namespace App\Repositories;

use App\Models\SellProduct;
use App\Services\UploadFileService;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class SellProductRepository.
 */
class SellProductRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return SellProduct::class;
    }

    public function get_paginated($paginate_data, $filters)
    {
        $sell_product_paginator =  $this->model
            ->with('media')
            ->filter($filters)
            ->paginate($paginate_data['per_page'], ['*'], 'page', $paginate_data['page']);

        return $sell_product_paginator;
    }

    public function all(array $columns = ['*'])
    {
        return $this->model->with('media')->get();
    }

    public function create(array $data)
    {
        if (!empty($data['photo'])) {
            $photo = $data['photo'];
            unset($data['photo']);
        }

        $sell_product = parent::create($data);
        if (!empty($data['product_types'])) {
            $sell_product->product_types()->attach($data['product_types']);
        }
        if (!empty($photo)) {
            UploadFileService::save_photo($photo, $sell_product);
        }
        return $sell_product;
    }

    public function update($sell_product, $data)
    {
        if (!empty($data['photo'])) {
            UploadFileService::save_photo($data['photo'], $sell_product);
            unset($data['photo']);
        }

        $sell_product->update($data);

        if (!empty($data['product_types'])) {
            $sell_product->product_types()->sync($data['product_types']);
        }
        return $sell_product;
    }

    public function remove_product_types($data): void
    {
        $sell_product = $this->model->find($data['sell_product_id']);
        $sell_product->product_types()->detach($data['product_types']);
    }
}
