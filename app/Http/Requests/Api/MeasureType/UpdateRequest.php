<?php

namespace App\Http\Requests\Api\MeasureType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('measure_types')->where(function ($query) {
                    return $query->where('company_id', session('company_id'));
                })->ignore($this->measure_type)
            ],
            'description' => ['nullable'],
            'quantity' => ['required', 'numeric', 'min:0'],
            'is_common' => ['nullable', 'boolean'],
            'base_measure_type_id' => ['required']
        ];
    }
}
