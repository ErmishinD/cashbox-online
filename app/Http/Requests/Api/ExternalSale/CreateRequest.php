<?php

namespace App\Http\Requests\Api\ExternalSale;

use App\Http\Requests\TenantRequest;
use App\Models\Cashbox;
use Illuminate\Validation\Rule;

class CreateRequest extends TenantRequest
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
            'shop_id' => ['required'],
            'amount' => ['required'],
            'sell_product_id' => ['required'],
            'payment_type' => ['required', Rule::in(Cashbox::PAYMENT_TYPES)],
            'description' => ['required'],
        ];
    }
}
