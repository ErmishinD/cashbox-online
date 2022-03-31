<?php

namespace App\Services;

use App\Models\ProductType;

class MeasureTypeService
{
    public static function is_main_for_any_product_type($measure_type): bool
    {
        return ProductType::where('main_measure_type_id', $measure_type->id)->count() > 0;
    }
}


