<?php

namespace App\Http\Requests\Api\ProductType;

use Illuminate\Foundation\Http\FormRequest;

class RemoveMeasureTypesRequest extends FormRequest
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
            'product_type_id' => ['required', 'exists:product_type_measures,product_type_id'],
            'measure_types' => ['required', 'array'],
        ];
    }
}
