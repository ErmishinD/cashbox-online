<?php

namespace App\Console\Commands;

use App\Models\Cashbox;
use App\Models\ProductConsumption;
use App\Models\Transfer;
use App\Models\WriteOff;
use App\Services\ProductPurchaseService;
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
        $this->info('Recalculating profit for cashbox IN transactions (without sell_product)');
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

        $this->info('Recalculating profit for cashbox OUT transactions (without sell_product)');
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

        $this->info('Recalculating profit for all sales and their product consumptions');
        Cashbox::whereNotNull('sell_product_id')
            ->with('product_consumptions')
            ->get()
            ->each(function ($transaction) {
                // recalculate profit of all sales (profit = round(amount - self_cost))
                $transaction->profit = round($transaction->amount - $transaction->self_cost, 2);
                $transaction->save();

                // recalculate profit of product consumptions
                $error = round($transaction->amount - $transaction->product_consumptions->sum('income'), 2);
                if ($error != 0) {
                    $this->error($transaction->id . ' -- income -- ' . $error);

                    $first_consumption = $transaction->product_consumptions->where('income', '>', 0)->first();
                    $first_consumption->income = round($first_consumption->income + $error, 2);
                    $first_consumption->profit = round($first_consumption->income - $first_consumption->cost, 2);
                    $first_consumption->save();
                }

                $error = round($transaction->profit - $transaction->product_consumptions->sum('profit'), 2);
                if ($error != 0) {
                    $this->error($transaction->id . ' -- profit -- ' . $error);

                    $first_consumption = $transaction->product_consumptions->first();
                    $first_consumption->profit = round($first_consumption->profit + $error, 2);
                    $first_consumption->save();
                }
            });

        return 0;
    }
}
