<?php

namespace App\Repositories;

use App\Models\Storage;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class StorageRepository.
 */
class StorageRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Storage::class;
    }
}
