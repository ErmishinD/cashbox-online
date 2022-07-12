<?php

namespace App\Http\Requests\Api\ProductPurchase;

use App\Http\Requests\TenantRequest;
use Illuminate\Support\Facades\Auth;

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
            'storage_id' => ['required'],
            'product_type_id' => ['required'],
            'quantity' => ['required', 'min:0'],
            'current_quantity' => ['required'],
            'cost' => ['required', 'numeric', 'min:0'],
            'current_cost' => ['required', 'numeric', 'min:0'],
            'expiration_date' => ['nullable', 'date', 'after:today'],
            'user_id' => ['required'],
            'counterparty_id' => ['required'],
        ];
    }

    public function prepareForValidation()
    {
        parent::prepareForValidation();
        $this->merge([
            'current_quantity' => $this->quantity,
            'current_cost' => $this->cost,
            'user_id' => Auth::id()
        ]);
    }
}
