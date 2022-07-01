<?php

namespace App\Http\Requests\Api\ProductPurchase;

use App\Http\Requests\TenantRequest;

class UpdateRequest extends TenantRequest
{
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
            'storage_id' => ['required'],
            'quantity' => ['required', 'min:0'],
            'current_quantity' => ['required'],
            'cost' => ['required', 'numeric', 'min:0'],
            'current_cost' => ['required', 'numeric', 'min:0'],
            'expiration_date' => ['nullable', 'date', 'after:today'],
        ];
    }

    public function prepareForValidation()
    {
        parent::prepareForValidation();
        $this->merge([
            'current_quantity' => $this->current_quantity ?? $this->quantity,
            'current_cost' => $this->current_cost ?? $this->cost,
        ]);
    }
}
