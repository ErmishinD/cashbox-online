<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class RoleRepository.
 */
class RoleRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Role::class;
    }

    public function createDefaultCompanyRoles($company_id)
    {
        $director_role = $this->model->create([
            'name' => 'director.' . $company_id, 'human_name' => 'Директор', 'company_id' => $company_id
        ]);
        $director_role->syncPermissions([
            'Role_access', 'Role_create', 'Role_show', 'Role_edit', 'Role_delete',
            'Company_show', 'Company_edit',
            'Shop_access', 'Shop_create', 'Shop_show', 'Shop_edit', 'Shop_delete',
            'Storage_access', 'Storage_create', 'Storage_show', 'Storage_edit', 'Storage_delete',
            'ProductType_access', 'ProductType_create', 'ProductType_show', 'ProductType_edit', 'ProductType_delete',
            'MeasureType_access', 'MeasureType_create', 'MeasureType_show', 'MeasureType_edit', 'MeasureType_delete',
            'SellProduct_access', 'SellProduct_create', 'SellProduct_show', 'SellProduct_edit', 'SellProduct_delete',
            'SellProductGroup_access', 'SellProductGroup_create', 'SellProductGroup_show', 'SellProductGroup_edit', 'SellProductGroup_delete',
            'ProductPurchase_access', 'ProductPurchase_create', 'ProductPurchase_show', 'ProductPurchase_edit', 'ProductPurchase_delete',
            'Cashbox_access', 'Cashbox_create', 'Cashbox_show', 'Cashbox_edit', 'Cashbox_delete', 'Cashbox_collect', 'Cashbox_history',
            'User_access', 'User_create', 'User_show', 'User_edit', 'User_delete',
            'Report_access',
        ]);

        $salesman_role = $this->model->create([
            'name' => 'salesman.' . $company_id, 'human_name' => 'Продавец', 'company_id' => $company_id
        ]);
        $salesman_role->syncPermissions([
            'Shop_access', 'Shop_show',
            'Storage_access', 'Storage_show',
            'ProductType_access', 'ProductType_show',
            'SellProduct_access', 'SellProduct_show',
            'SellProductGroup_access', 'SellProductGroup_show',
            'ProductPurchase_access', 'ProductPurchase_show',
        ]);

        $accountant_role = $this->model->create([
            'name' => 'accountant.' . $company_id, 'human_name' => 'Бухгалтер', 'company_id' => $company_id
        ]);
        $accountant_role->syncPermissions([
            'Cashbox_access', 'Cashbox_create', 'Cashbox_show', 'Cashbox_edit', 'Cashbox_delete',
            'Shop_access', 'Shop_show',
            'Storage_access', 'Storage_show',
            'ProductType_access', 'ProductType_show',
            'SellProduct_access', 'SellProduct_show',
            'SellProductGroup_access', 'SellProductGroup_show',
            'ProductPurchase_access', 'ProductPurchase_show',
        ]);
        $analyst_role = $this->model->create([
            'name' => 'analyst.' . $company_id, 'human_name' => 'Аналитик', 'company_id' => $company_id
        ]);
        $analyst_role->syncPermissions([
            'Cashbox_access', 'Cashbox_show',
            'Report_access',
            'Shop_access', 'Shop_show',
            'Storage_access', 'Storage_show',
            'ProductType_access', 'ProductType_show',
            'SellProduct_access', 'SellProduct_show',
            'SellProductGroup_access', 'SellProductGroup_show',
            'ProductPurchase_access', 'ProductPurchase_show',
        ]);
    }

    public function getWithUsersCount(): Collection
    {
        return $this->model
            ->withCount('users')
            ->get();
    }

    public function create(array $data)
    {
        $role = parent::create($data);

        if (!empty($data['permissions'])) {
            $role->permissions()->attach($data['permissions']);
        }

        return $role;
    }

    public function update($role, $data)
    {
        $role->update($data);

        if (!empty($data['permissions'])) {
            $role->permissions()->sync($data['permissions']);
        }

        return $role;
    }
}
