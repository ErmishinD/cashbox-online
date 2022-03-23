<?php

namespace App\Http\Requests\Api\SellProduct;

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
            'price' => ['nullable'],
            'has_discount' => ['nullable', 'boolean'],
            'product_types' => ['nullable', 'array'],
            'photo' => ['nullable']
        ];
    }
}
