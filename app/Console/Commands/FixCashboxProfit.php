<?php

namespace App\Console\Commands;

use App\Models\Cashbox;
use App\Models\ProductConsumption;
use App\Models\Transfer;
use App\Models\WriteOff;
use Illuminate\Console\Command;

class FixCashboxProfit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'profit:fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix profit column of cashboxes table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // _in without sell_product_id -> $data['self_cost'] = 0;
        //            $data['profit'] = $data['amount'];
        Cashbox::where('transaction_type', Cashbox::TRANSACTION_TYPES['in'])
            ->whereNull('sell_product_id')
            ->get()
            ->each(function ($transaction) {
                $transaction->self_cost = 0;
                $transaction->profit = $transaction->amount;
                $transaction->save();
            });

        // _out without sell_product_id -> $data['self_cost'] = $data['amount'];
        //            $data['profit'] = 0 - $data['amount'];
        Cashbox::where('transaction_type', Cashbox::TRANSACTION_TYPES['out'])
            ->whereNull('sell_product_id')
            ->get()
            ->each(function ($transaction) {
                $transaction->self_cost = $transaction->amount;
                $transaction->profit = 0 - $transaction->amount;
                $transaction->save();
            });

        // recalculate profit of all sales (profit = round(amount - self_cost))
        Cashbox::whereNotNull('sell_product_id')
            ->get()
            ->each(function ($transaction) {
                $transaction->profit = round($transaction->amount - $transaction->self_cost, 2);
                $transaction->save();
            });

        // recalculate profit of product consumptions
        ProductConsumption::whereNotIn('consumable_type', [Transfer::class, WriteOff::class])
            ->get()
            ->each(function ($product_consumption) {
                $product_consumption->profit = round($product_consumption->income - $product_consumption->cost, 2);
                $product_consumption->save();
            });

        return 0;
    }
}
