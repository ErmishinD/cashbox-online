<?php

namespace App\Http\Requests\Api\Cashbox;

use App\Models\Cashbox;
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
            'shop_id' => ['required'],
            'sell_product_id' => ['nullable', 'exists:sell_products,id'],
            'product_purchase_id' => ['nullable', 'exists:product_purchases,id'],
            'data' => ['nullable'],
            'transaction_type' => ['required', Rule::in(array_values(Cashbox::TRANSACTION_TYPES))],
            'payment_type' => ['required', Rule::in(array_values(Cashbox::PAYMENT_TYPES))],
            'amount' => ['required'],
            'description' => ['nullable'],
            'operator_id' => ['required', 'exists:users,id'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'operator_id' => $this->operator_id ?? Auth::user()->id,
            'transaction_type' => $this->transaction_type ?? Cashbox::TRANSACTION_TYPES['in'],
            'payment_type' => $this->payment_type ?? Cashbox::PAYMENT_TYPES['cash'],
        ]);
    }
}
