<?php

namespace App\Repositories;

use App\Models\Company;
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
        app(RoleRepository::class)->createDefaultCompanyRoles($company->id);
        return $company;
    }
}
