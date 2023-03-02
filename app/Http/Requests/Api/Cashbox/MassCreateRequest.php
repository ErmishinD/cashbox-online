<?php

namespace App\Http\Requests\Api\Cashbox;

use App\Http\Requests\TenantRequest;
use App\Models\Cashbox;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MassCreateRequest extends TenantRequest
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
            'transaction_type' => ['required', Rule::in(Cashbox::TRANSACTION_TYPES)],
            'payment_type' => ['required', Rule::in(Cashbox::PAYMENT_TYPES)],
            'operator_id' => ['required'],
            'external_sale_id' => ['nullable'],
            'sell_products' => ['required', 'array'],
        ];
    }

    public function prepareForValidation()
    {
        parent::prepareForValidation();
        $this->merge([
            'operator_id' => Auth::id(),
            'transaction_type' => $this->transaction_type ?? Cashbox::TRANSACTION_TYPES['in'],
        ]);
    }
}
