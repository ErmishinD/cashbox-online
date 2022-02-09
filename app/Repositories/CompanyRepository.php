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

    public function getForShow($id)
    {
        return $this->model->with(['shops', 'employees.roles'])->find($id);
    }

    public function create(array $data)
    {
        $company = parent::create($data);

        // create default company roles
        $role_repository = app(RoleRepository::class);
        $role_repository->createDefaultCompanyRoles($company->id);
        return $company;
    }
}
