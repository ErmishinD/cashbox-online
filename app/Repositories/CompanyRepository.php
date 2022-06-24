<?php

namespace App\Repositories;

use App\Models\BaseMeasureType;
use App\Models\Company;
use App\Models\MeasureType;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class CompanyRepository.
 */
class CompanyRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Company::class;
    }

    public function create(array $data)
    {
        $company = parent::create($data);

        // create default company roles
        $role_repository = app(RoleRepository::class);
        $role_repository->createDefaultCompanyRoles($company->id);

        // create director
        $user = User::create([
            'name' => $company->name . '\'s director',
            'username' => 'test.user' . $company->id,
            'email' => 'test.user' . $company->id . '@test.com',
            'password' => Hash::make('123456789'),
            'company_id' => $company->id,
        ]);
        $user->assignRole('director.' . $company->id);

        // create default shop with storage
        $shop = Shop::create([
            'company_id' => $company->id,
            'name' => 'Default shop',
            'address' => 'some default address',
        ]);
        Storage::create([
            'shop_id' => $shop->id,
            'name' => 'Default storage',
            'company_id' => $company->id
        ]);

        $base_measure_type_ids = BaseMeasureType::pluck('id');

        // create default measure types
        MeasureType::create([
            'base_measure_type_id' => $base_measure_type_ids[0],
            'name' => 'л',
            'quantity' => 1000,
            'company_id' => $company->id,
        ]);
        MeasureType::create([
            'base_measure_type_id' => $base_measure_type_ids[1],
            'name' => 'кг',
            'quantity' => 1000,
            'company_id' => $company->id,
        ]);
        MeasureType::create([
            'base_measure_type_id' => $base_measure_type_ids[2],
            'name' => 'шт',
            'quantity' => 1,
            'company_id' => $company->id,
        ]);

        return $company;
    }
}
