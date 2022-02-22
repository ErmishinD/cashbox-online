<?php

namespace App\Http\Requests\Api\ProductPurchase;

use Illuminate\Foundation\Http\FormRequest;

class MassCreateRequest extends FormRequest
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
            'storage_id' => ['required'],
            'payment_type' => ['required'],
            'product_types' => ['required', 'array']
        ];
    }
}
