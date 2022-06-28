<?php

use App\Models\Cashbox;
use App\Models\ProductConsumption;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_consumptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_purchase_id')->constrained()->onDelete('cascade');
            $table->string('consumable_type');
            $table->unsignedInteger('consumable_id');
            $table->unsignedBigInteger('quantity')->default(0);
            $table->unsignedDecimal('cost')->default(0);
            $table->unsignedDecimal('income')->default(0);
            $table->decimal('profit')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        $product_purchase_ids = \App\Models\ProductPurchase::withoutGlobalScopes()->whereNull('deleted_at')->pluck('id');

        $transactions = \App\Models\Cashbox::withoutGlobalScopes()->whereNull('deleted_at')->get();
        foreach ($transactions as $transaction) {
            if ($transaction->data) {
                foreach (json_decode($transaction->data, true) as $product_type_id => $data) {
                    foreach ($data as $purchase) {
                        if (!$product_purchase_ids->contains($purchase['id'])) {
                            continue;
                        }
                        $self_cost = $transaction->self_cost == 0 ? 1 : $transaction->self_cost;
                        $percent = $purchase['cost'] / $self_cost;
                        \Illuminate\Support\Facades\DB::table('product_consumptions')
                            ->insert([
                                'company_id' => $transaction->company_id,
                                'product_purchase_id' => $purchase['id'],
                                'consumable_type' => Cashbox::class,
                                'consumable_id' => $transaction->id,
                                'quantity' => $purchase['quantity'],
                                'cost' => $purchase['cost'],
                                'income' => $transaction->amount * $percent,
                                'profit' => $transaction->profit * $percent,
                                'created_at' => $transaction->created_at,
                                'updated_at' => $transaction->created_at
                            ]);
                    }
                }
            }
        }

        $write_offs = \App\Models\WriteOff::withoutGlobalScopes()->whereNull('deleted_at')->get();
        foreach ($write_offs as $write_off) {
            foreach ($write_off->data as $purchase) {
                if (!$product_purchase_ids->contains($purchase['id'])) {
                    continue;
                }
                \Illuminate\Support\Facades\DB::table('product_consumptions')
                    ->insert([
                        'company_id' => $write_off->company_id,
                        'product_purchase_id' => $purchase['id'],
                        'consumable_type' => \App\Models\WriteOff::class,
                        'consumable_id' => $write_off->id,
                        'quantity' => $purchase['quantity'],
                        'cost' => $purchase['cost'],
                        'income' => 0,
                        'profit' => -$purchase['cost'],
                        'created_at' => $write_off->created_at,
                        'updated_at' => $write_off->created_at
                    ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_consumptions');
    }
};
