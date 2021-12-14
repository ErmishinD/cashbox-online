<?php

namespace App\Repositories;

use App\Models\ProductPurchase;
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
}
