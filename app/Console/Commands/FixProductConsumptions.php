<?php

namespace App\Console\Commands;

use App\Models\Cashbox;
use Illuminate\Console\Command;

class FixProductConsumptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product_consumptions:fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $payments = Cashbox::with('product_consumptions.product_purchase')
            ->get();

        foreach ($payments as $payment) {
            if ($payment->product_consumptions->isEmpty()) {
                continue;
            }
            if (round($payment->amount, 2) != round($payment->product_consumptions->sum('income'), 2)) {
                foreach ($payment->product_consumptions as $product_consumption) {
                    if ($product_consumption->product_purchase->cost != 0) {
                        $purchase = $product_consumption->product_purchase;
                        $cost = $purchase->cost / $purchase->quantity * $product_consumption->quantity;
                        if ($payment->self_cost == 0) {
                            $this->error('self cost is 0 for payment ' . $payment->id);
                            continue;
                        }
                        $percent = $cost / $payment->self_cost;

                        $data = [
                            'cost' => $cost,
                            'income' => $payment->amount * $percent,
                            'profit' => $payment->profit * $percent,
                        ];
                    } else {
                        $data = [
                            'cost' => 0,
                            'income' => $payment->amount,
                            'profit' => $payment->profit,
                        ];
                    }
                    $this->info('updating product consumption ' . $product_consumption->id);
                    $product_consumption->update($data);
                }
            }
        }
        return Command::SUCCESS;
    }
}
