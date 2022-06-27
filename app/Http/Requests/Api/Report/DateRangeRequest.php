<?php

namespace App\Http\Requests\Api\Report;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class DateRangeRequest extends FormRequest
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
            'start_date' => ['required'],
            'end_date' => ['required'],
            'shop_id' => ['nullable']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'start_date' => $this->start_date ? Carbon::parse($this->start_date)->startOfDay() : today()->subDays(30),
            'end_date' => $this->end_date ? Carbon::parse($this->end_date)->endOfDay() : today()->addDay(),
        ]);
    }
}
