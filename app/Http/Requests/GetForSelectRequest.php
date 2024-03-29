<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetForSelectRequest extends FormRequest
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
            'entities' => ['required', 'array'],
            'entities.*' => [
                'required',
                'string',
                Rule::in([
                    'Shop', 'Storage', 'Category', 'ProductType', 'Counterparty', 'SellProduct'
                ])
            ],
        ];
    }
}
