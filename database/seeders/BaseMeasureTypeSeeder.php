<?php

namespace Database\Seeders;

use App\Models\BaseMeasureType;
use Illuminate\Database\Seeder;

class BaseMeasureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // создать базовые единицы измерения ("мл" и "г")
        BaseMeasureType::create(['type' => '_volume', 'name' => 'мл']);
        BaseMeasureType::create(['type' => '_weight', 'name' => 'г']);
        BaseMeasureType::create(['type' => '_quantity', 'name' => 'шт']);
    }
}
