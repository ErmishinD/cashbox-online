<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PaginateRequest extends FormRequest
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
            'per_page' => ['required', 'integer'],
            'page' => ['required', 'integer'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'per_page' => $this->perPage ?? ($this->per_page ?? 10),
            'page' => $this->page ?? 1
        ]);
    }
}
