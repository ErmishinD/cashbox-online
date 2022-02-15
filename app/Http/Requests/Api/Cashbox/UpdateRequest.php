<?php

namespace App\Http\Requests\Api\Cashbox;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'shop_id' => ['nullable'],
            'sellable_type' => ['nullable'],
            'sellable_id' => ['nullable'],
            'data' => ['nullable'],
            'transaction_type' => ['nullable'],
            'payment_type' => ['nullable'],
            'amount' => ['nullable'],
            'description' => ['nullable'],
            'operator_id' => ['nullable'],
            'collected_at' => ['nullable'],
            'collector_id' => ['nullable'],
        ];
    }
}
