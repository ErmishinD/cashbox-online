<?php

namespace App\Http\Resources\Api\Report;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProfitByDayCollection extends ResourceCollection
{
    protected $dateRange;

    public function dateRange($value)
    {
        $this->dateRange = $value;
        return $this;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $date_list = [];
        $amount_list = [];
        $self_cost_list = [];
        $profit_list = [];

        $date_period = new \DatePeriod($this->dateRange[0], new \DateInterval('P1D'), $this->dateRange[1]);
        foreach ($date_period as $date) {
            $date_list[] = $date->format('m-d');
            $transaction = $this->collection->where('date', $date->format('Y-m-d'))->first();
            if (!$transaction) {
                $amount_list[] = '0.00';
                $self_cost_list[] = '0.00';
                $profit_list[] = '0.00';
            } else {
                $amount_list[] = $transaction->sum_amount;
                $self_cost_list[] = $transaction->sum_self_cost;
                $profit_list[] = $transaction->sum_profit;
            }
        }

        return [
            'date_list' => $date_list,
            'amount_list' => $amount_list,
            'self_cost_list' => $self_cost_list,
            'profit_list' => $profit_list
        ];
    }
}
