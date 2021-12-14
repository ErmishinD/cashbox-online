<?php

namespace App\Repositories;

use App\Models\SellProduct;
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
}
