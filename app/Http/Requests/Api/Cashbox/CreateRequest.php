<?php

namespace App\Http\Requests\Api\Cashbox;

use App\Http\Requests\TenantRequest;
use App\Models\Cashbox;
use Illuminate\Support\Facades\Auth;
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
            'shop_id' => ['required'],
            'sell_product_id' => ['nullable', 'exists:sell_products,id'],
            'product_purchase_id' => ['nullable', 'exists:product_purchases,id'],
            'data' => ['nullable'],
            'transaction_type' => ['required', Rule::in(Cashbox::TRANSACTION_TYPES)],
            'payment_type' => ['required', Rule::in(Cashbox::PAYMENT_TYPES)],
            'amount' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable'],
            'operator_id' => ['required', 'exists:users,id'],
        ];
    }

    public function prepareForValidation()
    {
        parent::prepareForValidation();
        $this->merge([
            'operator_id' => $this->operator_id ?? Auth::id(),
            'transaction_type' => $this->transaction_type ?? Cashbox::TRANSACTION_TYPES['in'],
            'payment_type' => $this->payment_type ?? Cashbox::PAYMENT_TYPES['cash'],
        ]);
    }
}
