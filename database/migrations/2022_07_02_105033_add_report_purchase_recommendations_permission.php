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
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        // create permissions
        $permissions = ['Report_purchaseRecommendations'];
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
        //
    }
};
