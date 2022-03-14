<?php

namespace Tests\Feature\Api;

use App\Models\Company;
use App\Models\Role;
use App\Models\Shop;
use App\Models\User;
use App\Repositories\RoleRepository;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/companies/';
    private $table = 'companies';

    private $role_repository;

    /**
     * @var User
     */
    private $admin;
    /**
     * @var Company
     */
    private $base_company;
    /**
     * @var User
     */
    private $user_without_permissions;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesPermissionsSeeder::class);
        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');
        $this->role_repository = app(RoleRepository::class);

        $this->base_company = Company::factory()->create();
        $this->role_repository->createDefaultCompanyRoles($this->base_company->id);
        $this->user_without_permissions = User::factory()->create(['company_id' => $this->base_company->id]);
    }

    public function test_admin_can_get_all_companies()
    {
        Company::factory(2)->create();
        $all_companies_amount = Company::all()->count();

        $response = $this->actingAs($this->admin)->getJson($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount($all_companies_amount, $response['data']);
    }

    public function test_user_without_permissions_cannot_get_all_companies()
    {
        Company::factory(2)->create();

        $response = $this->actingAs($this->user_without_permissions)->getJson($this->base_route);
        $response->assertStatus(403);
    }

    public function test_admin_can_create_company()
    {
        $company_name = 'Company 1';
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'name' => $company_name
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => $company_name]
            ]);
        $this->assertDatabaseHas($this->table, ['name' => $company_name]);
    }

    public function test_user_without_permissions_cannot_create_company()
    {
        $company_name = 'Company +=-';
        $response = $this->actingAs($this->user_without_permissions)->postJson($this->base_route, [
            'name' => $company_name
        ]);
        $response->assertStatus(403);
    }

    public function test_admin_can_get_company()
    {
        $company = Company::factory()->create(['name' => 'Company 1']);
        $shop1 = Shop::factory()->create(['company_id' => $company->id]);
        $shop2 = Shop::factory()->create(['company_id' => $company->id]);

        $this->role_repository->createDefaultCompanyRoles($company->id);

        $user1 = User::factory()->create(['company_id' => $company->id]);
        $user1->assignRole('director.' . $company->id);

        $user2 = User::factory()->create(['company_id' => $company->id]);
        $user2->assignRole('salesman.' . $company->id);

        $user3 = User::factory()->create(['company_id' => $company->id]);
        $user3->assignRole('accountant.' . $company->id);

        $response = $this->actingAs($this->admin)->getJson($this->base_route . $company->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $company->id,
                    'name' => 'Company 1',
                    'shops' => [
                        [
                            'id' => $shop1->id,
                            'name' => $shop1->name,
                            'address' => $shop1->address,
                        ],
                        [
                            'id' => $shop2->id,
                            'name' => $shop2->name,
                            'address' => $shop2->address,
                        ]
                    ],
                    'employees' => [
                        [
                            'id' => $user1->id,
                            'name' => $user1->name,
                            'email' => $user1->email,
                            'roles' => [
                                ['name' => 'director.' . $company->id]
                            ],
                        ],
                        [
                            'id' => $user2->id,
                            'name' => $user2->name,
                            'email' => $user2->email,
                            'roles' => [
                                ['name' => 'salesman.' . $company->id]
                            ],
                        ],
                        [
                            'id' => $user3->id,
                            'name' => $user3->name,
                            'email' => $user3->email,
                            'roles' => [
                                ['name' => 'accountant.' . $company->id]
                            ]
                        ],

                    ]
                ]
            ]);
    }

    public function test_user_without_permissions_cannot_get_company()
    {
        $response = $this->actingAs($this->user_without_permissions)->getJson($this->base_route . $this->base_company->id);
        $response->assertStatus(403);
    }

    public function test_admin_can_edit_company()
    {
        $company = Company::factory()->create(['name' => 'Company name']);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route . $company->id, ['name' => 'NEW Company name']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'NEW Company name']
            ]);
        $this->assertDatabaseHas($this->table, ['name' => 'NEW Company name']);
    }

    public function test_user_without_permissions_cannot_edit_company()
    {
        $response = $this->actingAs($this->user_without_permissions)->patchJson($this->base_route . $this->base_company->id,
            ['name' => 'NEW Company name']);
        $response->assertStatus(403);
    }

    public function test_admin_can_delete_company()
    {
        $company = Company::factory()->create(['name' => 'My company']);
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route . $company->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertSoftDeleted($this->table, ['name' => 'My company']);
    }

    public function test_user_without_permissions_cannot_delete_company()
    {
        $response = $this->actingAs($this->user_without_permissions)->deleteJson($this->base_route . $this->base_company->id);
        $response->assertStatus(403);
    }
}
