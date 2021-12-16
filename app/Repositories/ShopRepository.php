<?php

namespace App\Repositories;

use App\Models\Shop;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ShopRepository.
 */
class ShopRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Shop::class;
    }

    public function getForSelect() {
        return $this->model->select('id', 'name')->get();
    }
}
