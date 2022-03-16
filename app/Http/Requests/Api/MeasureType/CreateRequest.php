<?php

namespace App\Http\Requests\Api\MeasureType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'base_measure_type_id' => ['required', 'exists:base_measure_types,id'],
            'name' => ['required'],
            'description' => ['nullable'],
            'quantity' => ['required', 'min:1'],
            'company_id' => ['required', 'exists:companies,id'],
            'is_common' => ['required', 'boolean'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'company_id' => Auth::user()->company_id
        ]);
    }
}
