<?php

namespace App\Console\Commands;

use App\Models\ProductPurchase;
use Illuminate\Console\Command;

class FixEditedPurchases extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'purchases:fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fixing current cost of edited purchases due to internal bug';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $error_current_cost = 0;

        $product_purchases = ProductPurchase::get();

        foreach($product_purchases as $product_purchase) {
            $correct_cost = $product_purchase->current_quantity != 0 
                ? $product_purchase->cost / $product_purchase->quantity * $product_purchase->current_quantity 
                : 0;

            if ($product_purchase->current_cost == $correct_cost) continue;

            $this->error('#' . $product_purchase->id . '. Update current cost from ' . $product_purchase->current_cost . ' to ' . $correct_cost);
            $error_current_cost += abs($product_purchase->current_cost - $correct_cost);
            $product_purchase->update(['current_cost' => $correct_cost]);
        }
        $this->info('Fixed error with ' . $error_current_cost . ' UAH');
        return Command::SUCCESS;
    }
}
