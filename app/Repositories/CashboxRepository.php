<?php

namespace App\Repositories;

use App\Models\Cashbox;
use App\Services\EnumDbCol;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class CashboxRepository.
 */
class CashboxRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Cashbox::class;
    }

    protected function get_enum($column_name) {
        $enums = [];
        $enumKeys = EnumDbCol::getEnumValues($this->model->getTable(), $column_name);

        foreach($enumKeys as $k => $v) $enums[$k] = __($v);

        return $enums;
    }


    public function getResourcces()
    {
        return $this->get_enum('resource');
    }

    public function getTransactionTypes() {
        return $this->get_enum('transaction_type');
    }

    public function getPaymentTypes() {
        return $this->get_enum('payment_type');
    }
}
