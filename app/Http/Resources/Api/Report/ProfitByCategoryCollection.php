<?php

namespace App\Http\Resources\Api\Report;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProfitByCategoryCollection extends ResourceCollection
{
    protected $categories;

    public function categories($value)
    {
        $this->categories = $value;
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
        $amount_list = [];
        $self_cost_list = [];
        $profit_list = [];

        foreach ($this->categories as $category) {
            $transaction = $this->collection->where('category_id', $category->id)->first();
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
            'categories_list' => $this->categories->pluck('name'),
            'amount_list' => $amount_list,
            'self_cost_list' => $self_cost_list,
            'profit_list' => $profit_list
        ];
    }
}
