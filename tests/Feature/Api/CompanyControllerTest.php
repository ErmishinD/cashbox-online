<?php

namespace Tests\Feature\Api;

use App\Models\Company;
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

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesPermissionsSeeder::class);
        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');
        $this->role_repository = app(RoleRepository::class);
    }

    public function test_admin_can_get_all_companies() {
        Company::factory(2)->create();

        $response = $this->actingAs($this->admin)->getJson($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(2, $response['data']);
    }

    public function test_salesman_can_get_all_companies() {
        $companies = Company::factory(2)->create();
        $user = User::factory()->create(['company_id' => $companies->first()->id]);

        $response = $this->actingAs($user)->getJson($this->base_route);
        $response->assertStatus(403);
    }

    public function test_admin_can_create_company() {
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

    public function test_admin_can_get_company() {
        $company = Company::factory()->create(['name' => 'Company 1']);
        $shop1 = Shop::factory()->create(['company_id' => $company->id]);
        $shop2 = Shop::factory()->create(['company_id' => $company->id]);

        $this->role_repository->createDefaultCompanyRoles($company->id);

        $user1 = User::factory()->create(['company_id' => $company->id]);
        $user1->assignRole('director.'.$company->id);

        $user2 = User::factory()->create(['company_id' => $company->id]);
        $user2->assignRole('salesman.'.$company->id);

        $user3 = User::factory()->create(['company_id' => $company->id]);
        $user3->assignRole('accountant.'.$company->id);

        $response = $this->actingAs($this->admin)->getJson($this->base_route.$company->id);
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
                                ['name' => 'director.'.$company->id]
                            ],
                        ],
                        [
                            'id' => $user2->id,
                            'name' => $user2->name,
                            'email' => $user2->email,
                            'roles' => [
                                ['name' => 'salesman.'.$company->id]
                            ],
                        ],
                        [
                            'id' => $user3->id,
                            'name' => $user3->name,
                            'email' => $user3->email,
                            'roles' => [
                                ['name' => 'accountant.'.$company->id]
                            ]
                        ],

                    ]
                ]
            ]);
    }

    public function test_admin_can_edit_company() {
        $company = Company::factory()->create(['name' => 'Company name']);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route.$company->id, ['name' => 'NEW Company name']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'NEW Company name']
            ]);
        $this->assertDatabaseHas($this->table, ['name' => 'NEW Company name']);
    }

    public function test_admin_can_delete_company() {
        $company = Company::factory()->create(['name' => 'My company']);
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route.$company->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertSoftDeleted($this->table, ['name' => 'My company']);
    }
}
