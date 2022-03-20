<?php

namespace App\Repositories;

use App\Models\MeasureType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
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
        return $this->model->with('base_measure_type')->get();
    }

    public function get_by_base_measure_type($base_measure_type_id): Collection
    {
        return $this->model->where('base_measure_type_id', $base_measure_type_id)->get();
    }

    public function get_grouped_by_base_measure_type(): Collection
    {
        return $this->model->with('base_measure_type:id,type')->get()->groupBy('base_measure_type.type');
    }
}
