<?php

use App\Models\Company;

test('companies index returns code 200')->get('/api/companies')->assertStatus(200);

test('companies index returns paginated products', function () {
    Company::factory(20)->create();
    $this->getJSON('/api/companies')
        ->assertStatus(200) // Status
        ->assertJSONCount(3)    // Pagination
        ->assertJSONCount(10, 'data');  // Data
});

// Create Tests

test('company created successfully', function () {
    $company = ['name' => "Test 1"];
    $this->postJSON('/api/companies', $company)->assertStatus(201);
    $this->assertDatabaseHas('companies', $company);
});

test('company creation failed', function () {
    $company = ['name' => ""];
    $this->postJSON('/api/companies', $company)->assertStatus(422);
    $this->assertDatabaseMissing('companies', $company);
});

// Find Tests

test('company found via id', function () {
    $company = Company::factory()->create();

    $response = $this->getJSON("/api/companies/{$company->id}")->assertStatus(200);
    $this->assertEquals($response->getOriginalContent()->toArray(), $company->toArray());
});

test('company not found via id')->getJSON("/api/companies/0")->assertStatus(404);

// Update Test

test('company updated successfully', function () {
    $company = Company::factory()->create()->toArray();
    $company['name'] .= ' Updated';

    $response = $this->putJSON('/api/companies/' . $company['id'], $company)->assertStatus(200);
    $this->assertEquals($response->getOriginalContent()->toArray(), $company);
});

test('company update failed', function () {
    $company = Company::factory()->create()->toArray();
    $company['name'] = "";

    $this->putJSON('/api/companies/' . $company['id'], $company)->assertStatus(422);
});

// Delete

test('company deleted successfully', function () {
    $company = Company::factory()->create();

    $this->deleteJSON('/api/companies/' . $company->id);
    $this->assertDatabaseMissing('companies', $company->makeHidden('logoLink')->toArray());
});
