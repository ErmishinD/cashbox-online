<?php

namespace App\Http\Requests\Api\SellProduct;

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
            'company_id' => ['required'],
            'name' => [
                'required',
                Rule::unique('sell_products')->where(function ($query) {
                    return $query->where('company_id', session('company_id'));
                })->ignore($this->sell_product)
            ],
            'price' => ['required', 'numeric', 'min:0'],
            'has_discount' => ['nullable', 'boolean'],
            'product_types' => ['nullable', 'array'],
            'product_types.*.quantity' => ['numeric', 'min:0'],
            'photo' => ['nullable'],
            'category_id' => ['nullable'],
            'position' => ['nullable', 'integer', 'gt:0']
        ];
    }
}
