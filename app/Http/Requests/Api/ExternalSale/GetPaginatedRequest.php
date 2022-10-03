<?php

namespace App\Http\Requests\Api\ExternalSale;

use App\Http\Requests\TenantRequest;

class GetPaginatedRequest extends TenantRequest
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
            'shop_id' => ['required']
        ];
    }
}
