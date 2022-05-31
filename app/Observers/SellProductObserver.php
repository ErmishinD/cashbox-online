<?php

namespace App\Observers;

use App\Models\SellProduct;

class SellProductObserver
{

    public function creating(SellProduct $sellProduct)
    {
        if (is_null($sellProduct->position)) {
            $sellProduct->position = SellProduct::where('company_id', $sellProduct->company_id)->max('position') + 1;
            return;
        }

        $lowerPriorityProducts = SellProduct::where('company_id', $sellProduct->company_id)
            ->where('position', '>=', $sellProduct->position)
            ->get();

        foreach ($lowerPriorityProducts as $lowerPriorityProduct) {
            $lowerPriorityProduct->position++;
            $lowerPriorityProduct->saveQuietly();
        }
    }

    public function updating(SellProduct $sellProduct)
    {
        if ($sellProduct->isClean('position')) {
            return;
        }

        if (is_null($sellProduct->position)) {
            $sellProduct->position = SellProduct::where('company_id', $sellProduct->company_id)->max('position');
        }

        if ($sellProduct->getOriginal('position') > $sellProduct->position) {
            $positionRange = [
                $sellProduct->position, $sellProduct->getOriginal('position')
            ];
        } else {
            $positionRange = [
                $sellProduct->getOriginal('position'), $sellProduct->position
            ];
        }

        $lowerPriorityProducts = SellProduct::where('company_id', $sellProduct->company_id)
            ->whereBetween('position', $positionRange)
            ->where('id', '!=', $sellProduct->id)
            ->get();

        foreach ($lowerPriorityProducts as $lowerPriorityProduct) {
            if ($sellProduct->getOriginal('position') < $sellProduct->position) {
                $lowerPriorityProduct->position--;
            } else {
                $lowerPriorityProduct->position++;
            }
            $lowerPriorityProduct->saveQuietly();
        }
    }

    public function deleted(SellProduct $sellProduct)
    {
        $lowerPriorityProducts = SellProduct::where('company_id', $sellProduct->company_id)
            ->where('position', '>', $sellProduct->position)
            ->get();

        foreach ($lowerPriorityProducts as $lowerPriorityProduct) {
            $lowerPriorityProduct->position--;
            $lowerPriorityProduct->saveQuietly();
        }
    }
}
