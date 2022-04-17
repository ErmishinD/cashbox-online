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
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('from_storage_id')->constrained('storages')->onDelete('cascade');
            $table->foreignId('to_storage_id')->constrained('storages')->onDelete('cascade');
            $table->foreignId('product_purchase_id')->constrained('product_purchases');
            $table->foreignId('transferred_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->references('id')->on('transfers');
            $table->json('data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // create permissions
        $permissions = ['Transfer_access', 'Transfer_create', 'Transfer_show'];
        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::create(['name' => $permission]);
        }

        // add this permission to director's roles
        $companyIds = \App\Models\Company::pluck('id');
        foreach ($companyIds as $companyId) {
            $role = \App\Models\Role::where('company_id', $companyId)->first();
            $role->givePermissionTo($permissions);
        }
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
