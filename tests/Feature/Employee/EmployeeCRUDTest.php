<?php

use App\Models\Company;
use App\Models\Employee;

test('employees index returns code 200')->get('/api/employees')->assertStatus(200);

test('employees index returns paginated products', function () {
    Employee::factory(20)->create();
    $this->getJSON('/api/employees')
        ->assertStatus(200) // Status
        ->assertJSONCount(3)    // Pagination
        ->assertJSONCount(10, 'data');  // Data
});

// Create Tests

test('employee created successfully', function () {
    $employee =
        [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'jd@gmail.com',
            'phone' => '09123456789',
            'company_id' => Company::factory()->create()->id
        ];

    $this->postJSON('/api/employees', $employee)->assertStatus(201);
    $this->assertDatabaseHas('employees', $employee);
});

test('employee creation failed', function () {
    $employee =
        [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'jd@gmail.com',
            'phone' => '09123456789',
            'company_id' => null
        ];

    $this->postJSON('/api/employees', $employee)->assertStatus(422);
    $this->assertDatabaseMissing('employees', $employee);
});

// Find Tests

test('employee found via id', function () {
    $employee = Employee::factory()->create();

    $response = $this->getJSON("/api/employees/{$employee->id}")->assertStatus(200);
    $this->assertEquals($response->getOriginalContent()->toArray(), $employee->toArray());
});

test('employee not found via id')->getJSON("/api/employees/0")->assertStatus(404);

// Update Test

test('employee updated successfully', function () {
    $employee = Employee::factory()->create()->toArray();
    $employee['first_name'] = 'John';
    $employee['last_name'] = 'Doe';
    $employee['email'] = 'jd@gmail.com';
    $employee['phone'] = '09123456789';
    $employee['company_id'] = Company::factory()->create()->id;

    $response = $this->putJSON('/api/employees/' . $employee['id'], $employee)->assertStatus(200);
    $this->assertEquals($response->getOriginalContent()->toArray(), $employee);
});

test('employee update failed', function () {
    $employee = Employee::factory()->create()->toArray();
    $employee['first_name'] = '';
    $employee['last_name'] = '';

    $this->putJSON('/api/employees/' . $employee['id'], $employee)->assertStatus(422);
});

// Delete

test('employee deleted successfully', function () {
    $employee = Employee::factory()->create();

    $this->deleteJSON('/api/employees/' . $employee->id);
    $this->assertDatabaseMissing('employees', $employee->toArray());
});
