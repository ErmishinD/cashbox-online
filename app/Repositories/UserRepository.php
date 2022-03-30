<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return User::class;
    }

    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = parent::create($data);

        if (!empty($data['roles'])) {
            $user->roles()->attach($data['roles']);
        }

        return  $user;
    }

    public function update($user, $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);

        if (!empty($data['roles'])) {
            $user->roles()->sync($data['roles']);
        }

        return $user;
    }

    public function getWithRoles()
    {
        return $this->model->with('roles')->get();
    }
}
