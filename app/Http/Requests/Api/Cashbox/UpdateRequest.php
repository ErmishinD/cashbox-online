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
            'company_id' => ['required'],
            'shop_id' => ['required'],
            'resource' => ['required'],
            'resource_id' => ['required'],
            'transaction_type' => ['required'],
            'payment_type' => ['required'],
            'amount' => ['required'],
            'description' => ['nullable'],
            'operator_id' => ['nullable'],
            'collected_at' => ['nullable'],
            'collector_id' => ['nullable'],
        ];
    }
}
