<?php

namespace App\Repositories;

use App\Models\Transfer;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class TransferRepository.
 */
class TransferRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Transfer::class;
    }
}
