<?php

namespace App\Http\Requests\Api\Cashbox;

use App\Http\Requests\TenantRequest;

class CollectPaymentsRequest extends TenantRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ids' => ['required', 'array']
        ];
    }
}
