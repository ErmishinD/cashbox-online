<?php

namespace App\Repositories;

use App\Models\BaseMeasureType;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class BaseMeasureTypeRepository.
 */
class BaseMeasureTypeRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return BaseMeasureType::class;
    }
}
