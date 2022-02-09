<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Role_access', 'Role_create', 'Role_show', 'Role_edit', 'Role_delete',
            'Company_access', 'Company_create', 'Company_show', 'Company_edit', 'Company_delete',
            'Shop_access', 'Shop_create', 'Shop_show', 'Shop_edit', 'Shop_delete',
            'Storage_access', 'Storage_create', 'Storage_show', 'Storage_edit', 'Storage_delete',
            'ProductType_access', 'ProductType_create', 'ProductType_show', 'ProductType_edit', 'ProductType_delete',
            'MeasureType_access', 'MeasureType_create', 'MeasureType_show', 'MeasureType_edit', 'MeasureType_delete',
            'SellProduct_access', 'SellProduct_create', 'SellProduct_show', 'SellProduct_edit', 'SellProduct_delete',
            'SellProductGroup_access', 'SellProductGroup_create', 'SellProductGroup_show', 'SellProductGroup_edit', 'SellProductGroup_delete',
            'ProductPurchase_access', 'ProductPurchase_create', 'ProductPurchase_show', 'ProductPurchase_edit', 'ProductPurchase_delete',
            'Cashbox_access', 'Cashbox_create', 'Cashbox_show', 'Cashbox_edit', 'Cashbox_delete',
            'User_access', 'User_create', 'User_show', 'User_edit', 'User_delete',
            'Report_access',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $super_admin_role = Role::create(['name' => 'Super Admin']);
    }
}
