<?php

namespace App\Http\Requests\Api\ProductType;

use App\Http\Requests\TenantRequest;
use App\Models\ProductType;
use Illuminate\Validation\Rule;

class CreateRequest extends TenantRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_id' => ['required'],
            'name' => [
                'required',
                Rule::unique('product_types')->where(function ($query) {
                    return $query->where('company_id', session('company_id'));
                })->ignore($this->product_type)
            ],
            'type' => ['required', Rule::in(array_values(ProductType::TYPES))],
            'photo' => ['nullable'],
            'base_measure_type_id' => ['required', 'exists:base_measure_types,id'],
            'main_measure_type_id' => ['required', 'exists:measure_types,id'],
            'barcode' => ['nullable'],
            'measure_types' => ['nullable', 'array'],
            'category_id' => ['nullable'],
            'warning_threshold' => ['nullable', 'integer', 'gte:0']
        ];
    }
}
