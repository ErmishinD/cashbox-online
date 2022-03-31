<?php

namespace Tests\Feature\Api;

use App\Models\Company;
use App\Models\Role;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\User;
use App\Repositories\RoleRepository;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/users/';
    private $table = 'users';
    /**
     * @var User
     */
    private $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesPermissionsSeeder::class);
        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');

        $company = Company::factory()->create();
        app(RoleRepository::class)->createDefaultCompanyRoles($company->id);
        $this->admin->update(['company_id' => $company->id]);

        $this->withoutExceptionHandling();
    }

    public function test_admin_can_get_all_users()
    {
        User::factory()->count(5)->create(['company_id' => $this->admin->company_id]);

        $response = $this->actingAs($this->admin)->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(6, $response['data']);
    }

    public function test_admin_can_create_user()
    {
        $name = 'Some human name';
        $username = 'username';
        $email = 'username@mail.com';
        $random_role_id = Role::where('company_id', $this->admin->company_id)->pluck('id')->random(1)->first();
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => 'password',
            'roles' => [$random_role_id]
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'roles' => [
                        ['id' => $random_role_id]
                    ]
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'name' => $name, 'company_id' => $this->admin->company_id, 'email' => $email, 'username' => $username
        ]);
    }

    public function test_admin_can_get_user()
    {
        $user = User::factory()->create(['company_id' => $this->admin->company_id]);
        $role = Role::where('company_id', $this->admin->company_id)->get()->random();
        $user->assignRole($role->id);

        $response = $this->actingAs($this->admin)->get($this->base_route . $user->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                    'roles' => [
                        [
                            'id' => $role->id,
                            'name' => $role->name,
                            'human_name' => $role->human_name
                        ],
                    ]
                ]
            ]);
    }

    public function test_admin_can_edit_user()
    {
        $user = User::factory()->create(['company_id' => $this->admin->company_id]);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route . $user->id, [
            'name' => 'NEW name',
            'username' => $user->username,
            'email' => $user->email
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'name' => 'NEW name'
                ]
            ]);

        $this->assertDatabaseHas($this->table, [
            'company_id' => $this->admin->company_id, 'name' => 'NEW name'
        ]);
    }

    public function test_admin_can_delete_user()
    {
        $user = User::factory()->create(['company_id' => $this->admin->company_id]);

        $response = $this->actingAs($this->admin)->deleteJson($this->base_route . $user->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertSoftDeleted($this->table, ['id' => $user->id]);
    }
}
