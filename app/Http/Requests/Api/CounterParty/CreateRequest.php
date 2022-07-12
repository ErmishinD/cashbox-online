<?php

namespace App\Http\Requests\Api\CounterParty;

use App\Http\Requests\TenantRequest;
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
            'name' => ['required', Rule::unique('counterparties', 'name')->withoutTrashed()]
        ];
    }
}
