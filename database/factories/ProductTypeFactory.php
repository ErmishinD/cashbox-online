<?php

namespace Database\Factories;

use App\Models\BaseMeasureType;
use App\Models\Company;
use App\Models\MeasureType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $base_measure_type = BaseMeasureType::inRandomOrder()->first();
        $main_measure_type = MeasureType::inRandomOrder()->where('base_measure_type_id', $base_measure_type->id)->first();
        return [
            'company_id' => Company::inRandomOrder()->first()->id,
            'name' => $this->faker->word,
            'type' => $this->faker->randomElement(['_perishable', '_imperishable']),
            'photo' => $this->faker->imageUrl,
            'base_measure_type_id' => $base_measure_type->id,
            'main_measure_type_id' => $main_measure_type->id,
            'barcode' => $this->faker->numerify('##########')
        ];
    }
}
