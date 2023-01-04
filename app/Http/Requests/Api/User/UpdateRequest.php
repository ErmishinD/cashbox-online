<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\TenantRequest;
use App\Models\Role;
use Illuminate\Validation\Rule;

class UpdateRequest extends TenantRequest
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
            'username' => ['required', Rule::unique('users')->ignore($this->user)->withoutTrashed()],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)->withoutTrashed()],
            'password' => ['nullable'],
            'roles' => ['nullable', 'array'],
            'roles.*' => [Rule::in(Role::pluck('id'))]
        ];
    }
}
