<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\TenantRequest;
use App\Models\Role;
use Illuminate\Validation\Rule;

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
            'name' => ['required'],
            'username' => ['required', Rule::unique('users')->ignore($this->user)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)],
            'password' => ['required'],
            'company_id' => ['required'],
            'roles' => ['nullable', 'array'],
            'roles.*' => [Rule::in(Role::pluck('id'))]
        ];
    }
}
