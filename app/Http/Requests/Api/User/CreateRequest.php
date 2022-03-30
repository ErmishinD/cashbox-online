<?php

namespace App\Http\Requests\Api\User;

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
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'company_id' => ['required'],
            'roles' => ['nullable', 'array']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'company_id' => session('company_id') ?? Auth::user()->company_id
        ]);
    }
}
