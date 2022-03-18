<?php

namespace App\Repositories;

use App\Models\MeasureType;
use Illuminate\Database\Eloquent\Collection;
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

    public function get_for_index(): Collection
    {
        return $this->model->with('base_measure_type')->onlyInCompany()->get();
    }

    public function get_by_base_measure_type($base_measure_type_id): Collection
    {
        return $this->model->onlyInCompany()->where('base_measure_type_id', $base_measure_type_id)->get();
    }
}
