<?php

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
        Schema::create('external_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('shop_id')->constrained();
            $table->unsignedDecimal('amount')->default(0);
            $table->foreignId('sell_product_id')->constrained();
            $table->enum('payment_type', ['_cash', '_card'])->default('_cash');
            $table->text('description')->nullable();
            $table->dateTime('confirmed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // create permissions
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        $permissions = ['ExternalSale_access', 'ExternalSale_confirm'];
        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::create(['name' => $permission]);
        }

        // add these permissions to director's roles
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
        Schema::dropIfExists('external_sales');

        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        \Spatie\Permission\Models\Permission::whereIn('name', ['ExternalSale_access', 'ExternalSale_confirm'])->delete();
    }
};
