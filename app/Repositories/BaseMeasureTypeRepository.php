<?php

namespace App\Repositories;

use App\Models\BaseMeasureType;
use App\Services\EnumDbCol;
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

    /**
     * @return array
     */
    public function getTypes()
    {
        $enums = [];
        $enumKeys = EnumDbCol::getEnumValues($this->model->getTable(), 'type');

        foreach($enumKeys as $k => $v) $enums[$k] = __($v);

        return $enums;
    }

    public function getForSelect() {
        return $this->model->select('id', 'name')->get();
    }
}
