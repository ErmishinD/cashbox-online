<?php

namespace Tests\Feature\Api;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/companies/';


    public function test_can_get_all_companies() {
        Company::factory()->create();
        Company::factory()->create();

        $response = $this->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(2, $response['data']);
    }

    public function test_can_create_company() {
        $company_name = 'Company 1';
        $response = $this->postJson($this->base_route, [
           'name' => $company_name
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => $company_name]
            ]);
        $this->assertDatabaseHas('companies', ['name' => $company_name]);
    }

    public function test_can_get_company() {
        $company = Company::factory()->create(['name' => 'Company 1']);
        $response = $this->get($this->base_route.$company->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'Company 1']
            ]);
    }

    public function test_can_edit_company() {
        $company = Company::factory()->create(['name' => 'Company name']);
        $response = $this->patchJson($this->base_route.$company->id, ['name' => 'NEW Company name']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'NEW Company name']
            ]);
        $this->assertDatabaseHas('companies', ['name' => 'NEW Company name']);
    }

    public function test_can_delete_company() {
        $company = Company::factory()->create(['name' => 'My company']);
        $response = $this->deleteJson($this->base_route.$company->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertDatabaseMissing('companies', ['name' => 'My company']);
    }
}
