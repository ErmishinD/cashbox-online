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
        Schema::create('counterparties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        // create default counterparties
        $companies = \App\Models\Company::all();
        foreach ($companies as $company) {
            \App\Models\Counterparty::create([
                'company_id' => $company->id,
                'name' => $company->name
            ]);
        }

        // create permissions
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        $permissions = ['Counterparty_access', 'Counterparty_create', 'Counterparty_show', 'Counterparty_edit', 'Counterparty_delete'];
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
        Schema::dropIfExists('counterparties');
    }
};
