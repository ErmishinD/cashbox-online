<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashboxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade');
            $table->foreignId('sell_product_id')->nullable()->constrained('sell_products')->onDelete('set null');
            $table->foreignId('product_purchase_id')->nullable()->constrained('product_purchases')->onDelete('set null');
            $table->json('data')->nullable();
            $table->enum('transaction_type', ['_in', '_out'])->default('_in');
            $table->enum('payment_type', ['_cash', '_card'])->default('_cash');
            $table->unsignedDecimal('amount');
            $table->text('description')->nullable();
            $table->foreignId('operator_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('collected_at')->nullable();
            $table->foreignId('collector_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('cashboxes')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cashboxes');
    }
}
