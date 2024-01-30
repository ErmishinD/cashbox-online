<?php

namespace App\Http\Requests\Api\CounterParty;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'start_date' => !empty($this->start_date) ? Carbon::parse($this->start_date)->startOfDay() : today()->subCentury(),
            'end_date' => !empty($this->end_date) ? Carbon::parse($this->end_date)->addDay() : today()->addDay(),
        ]);
    }
}
