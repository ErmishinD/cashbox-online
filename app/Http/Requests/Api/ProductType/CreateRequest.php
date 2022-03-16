<?php

namespace App\Http\Requests\Api\ProductType;

use App\Models\ProductType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_id' => ['required'],
            'name' => ['required'],
            'type' => ['required', Rule::in(array_values(ProductType::TYPES))],
            'photo' => ['nullable'],
            'base_measure_type_id' => ['required', 'exists:base_measure_types,id'],
            'main_measure_type_id' => ['required', 'exists:measure_types,id'],
            'barcode' => ['nullable'],
            'measure_types' => ['nullable', 'array']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'company_id' => $this->company_id ?? Auth::user()->company_id
        ]);
    }
}
