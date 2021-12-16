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

        foreach($enumKeys as $k => $v) $enums[$k] = __($v);

        return $enums;
    }

    public function getForSelect() {
        return $this->model->select('id', 'name')->get();
    }
}
