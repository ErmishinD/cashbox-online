<?php

namespace App\Http\Requests\Api\MeasureType;

use App\Http\Requests\TenantRequest;

class GetByBaseMeasureTypeRequest extends TenantRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'base_measure_type_id' => ['required']
        ];
    }
}
