<?php

namespace App\Repositories;

use App\Models\SellProductGroup;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class SellProductGroupRepository.
 */
class SellProductGroupRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return SellProductGroup::class;
    }
}
