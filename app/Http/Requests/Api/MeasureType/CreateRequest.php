<?php

namespace App\Http\Requests\Api\MeasureType;

use App\Http\Requests\TenantRequest;
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
            'base_measure_type_id' => ['required'],
            'name' => [
                'required',
                Rule::unique('measure_types')->where(function ($query) {
                    return $query->where('company_id', session('company_id'));
                })->ignore($this->measure_type)
            ],
            'description' => ['nullable'],
            'quantity' => ['required', 'numeric', 'min:0'],
            'company_id' => ['required'],
            'is_common' => ['nullable', 'boolean'],
        ];
    }
}
