<?php

namespace App\Http\Requests\Api\SellProduct;

use Illuminate\Foundation\Http\FormRequest;

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
            'price' => ['required'],
            'has_discount' => ['required', 'boolean'],
            'product_types' => ['nullable', 'array']
        ];
    }
}
