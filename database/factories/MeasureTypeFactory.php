<?php

namespace Database\Factories;

use App\Models\BaseMeasureType;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeasureTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $base_measure_type_id = (isset($attribues['base_measure_type_id'])) ?: $this->faker->randomElement(BaseMeasureType::pluck('id'));

        return [
            'base_measure_type_id' => $base_measure_type_id,
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomElement([10, 100, 1000, 10000]),
            'company_id' => (isset($attribues['company_id'])) ?: $this->faker->randomElement(Company::pluck('id')),
            'is_common' => $this->faker->boolean(35),
        ];
    }
}
