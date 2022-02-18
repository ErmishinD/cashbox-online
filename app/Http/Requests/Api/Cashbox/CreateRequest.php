<?php

namespace App\Http\Requests\Api\Cashbox;

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
            'shop_id' => ['required'],
            'sell_product_id' => ['nullable'],
            'data' => ['nullable'],
            'transaction_type' => ['required'],
            'payment_type' => ['required'],
            'amount' => ['required'],
            'description' => ['nullable'],
            'operator_id' => ['nullable'],
            'collected_at' => ['nullable'],
            'collector_id' => ['nullable'],

            'sell_products' => ['nullable', 'array'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'operator_id' => $this->operator_id ?? Auth::user()->id,
            'transaction_type' => $this->transaction_type ?? '_in',
        ]);
    }
}
