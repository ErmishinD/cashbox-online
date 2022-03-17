<?php

namespace App\Http\Requests\Api\SellProduct;

use Illuminate\Foundation\Http\FormRequest;

class RemoveProductTypesRequest extends FormRequest
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
            'sell_product_id' => ['required'],
            'product_types' => ['required', 'array'],
        ];
    }
}
