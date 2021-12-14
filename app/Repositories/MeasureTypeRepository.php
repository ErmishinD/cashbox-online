<?php

namespace App\Repositories;

use App\Models\MeasureType;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class MeasureTypeRepository.
 */
class MeasureTypeRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return MeasureType::class;
    }
}
