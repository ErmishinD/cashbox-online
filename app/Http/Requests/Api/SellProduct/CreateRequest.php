<?php

namespace App\Http\Requests\Api\SellProduct;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'price' => ['required', 'numeric', 'min:0'],
            'has_discount' => ['nullable', 'boolean'],
            'product_types' => ['nullable', 'array'],
            'product_types.*.quantity' => ['numeric', 'min:0'],
            'photo' => ['nullable']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
           'company_id' => $this->company_id ?? Auth::user()->company_id
        ]);
    }
}
