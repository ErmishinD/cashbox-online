<?php

namespace App\Http\Requests\Api\ProductType;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'company_id' => ['nullable'],
            'name' => ['nullable'],
            'type' => ['nullable'],
            'photo' => ['nullable'],
            'base_measure_type_id' => ['nullable'],
            'barcode' => ['nullable'],
            'measure_types' => ['nullable', 'array'],
        ];
    }
}
