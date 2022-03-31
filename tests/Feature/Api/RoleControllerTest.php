<?php

namespace Tests\Feature\Api;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use App\Repositories\RoleRepository;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class RoleControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    private $base_route = '/api/roles/';
    private $table = 'roles';

    /**
     * @var User
     */
    private $admin;
    private $all_permission_ids;

    public function setUp(): void
    {
        parent::setUp();
        $this->setUpFaker();

        $this->seed(RolesPermissionsSeeder::class);

        $this->all_permission_ids = Permission::pluck('id');

        $company = Company::factory()->create();

        $role_repository = app(RoleRepository::class);
        $role_repository->createDefaultCompanyRoles($company->id);

        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');
        $this->admin->company_id = $company->id;
        $this->admin->save();
    }

    public function test_admin_can_get_all_roles_in_company()
    {
        $response = $this->actingAs($this->admin)->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson(['success' => true]);
    }

    public function test_admin_can_create_role()
    {
        $random_permissions = $this->faker->randomElements($this->all_permission_ids);
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'human_name' => 'New Role',
            'permissions' => $random_permissions
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'name' => 'new-role.' . $this->admin->company_id,
                    'human_name' => 'New Role',
                    'permissions' => $random_permissions
                ]
            ]);
    }

    public function test_admin_can_show_role()
    {
        $random_permissions = $this->faker->randomElements($this->all_permission_ids);
        $role = Role::factory()->create(['company_id' => $this->admin->company_id]);
        $role->permissions()->sync($random_permissions);

        $response = $this->actingAs($this->admin)->get($this->base_route . $role->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $role->id,
                    'name' => $role->name,
                    'human_name' => $role->human_name,
                    'permissions' => $random_permissions
                ]
            ]);
    }

    public function test_admin_can_delete_role()
    {
        $random_permissions = $this->faker->randomElements($this->all_permission_ids);
        $role = Role::factory()->create(['company_id' => $this->admin->company_id]);
        $role->permissions()->sync($random_permissions);

        $response = $this->actingAs($this->admin)->delete($this->base_route . $role->id);
        $response->assertStatus(202)->assertJson(['success' => true]);


        $role2 = Role::factory()->create(['company_id' => $this->admin->company_id]);
        $role2->permissions()->sync($random_permissions);
        $some_user = User::factory()->create(['company_id' => $this->admin->company_id]);
        $some_user->assignRole($role2);

        $response = $this->actingAs($this->admin)->delete($this->base_route . $role2->id);
        $response->assertStatus(409)->assertJson(['success' => false]);
    }
}
