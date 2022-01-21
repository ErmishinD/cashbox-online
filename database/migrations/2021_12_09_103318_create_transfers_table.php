<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_storage_id')->constrained('storages')->onDelete('cascade');
            $table->foreignId('to_storage_id')->constrained('storages')->onDelete('cascade');
            $table->foreignId('product_type_id')->constrained('product_types')->onDelete('cascade');
            $table->unsignedBigInteger('quantity');
            $table->foreignId('confirmed_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
}
