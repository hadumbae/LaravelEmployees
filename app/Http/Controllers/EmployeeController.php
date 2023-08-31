<?php

namespace App\Http\Controllers;

use App\Actions\Company\LoadAllCompaniesAction;
use App\Actions\Employee\CreateEmployeeAction;
use App\Actions\Employee\DeleteEmployeeAction;
use App\Actions\Employee\FindEmployeeAction;
use App\Actions\Employee\PaginateEmployeesAction;
use App\Actions\Employee\UpdateEmployeeAction;
use App\DataTransferObjects\Factories\EmployeeDataFactory;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeActionRequest;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class EmployeeController extends Controller
{

    public function __construct(
        private LoadAllCompaniesAction $load_all_companies,
        private PaginateEmployeesAction $paginate_employees,
        private CreateEmployeeAction $create_employee,
        private FindEmployeeAction $find_employee,
        private UpdateEmployeeAction $update_employee,
        private DeleteEmployeeAction $delete_employee,
    ) {
    }

    public function index(): InertiaResponse
    {
        $employees = $this->paginate_employees->execute(
            number_per_page: 10,
            load: ['company']
        );

        return Inertia::render(
            'Employees/Index',
            ['employees' => $employees]
        );
    }

    public function create(): InertiaResponse
    {
        $companies = $this->load_all_companies->execute();

        return Inertia::render(
            "Employees/Create",
            ['companies' => $companies]
        );
    }

    public function store(EmployeeRequest $request): RedirectResponse
    {
        $employeeData = EmployeeDataFactory::fromRequest($request);
        $employee = $this->create_employee->execute(employeeData: $employeeData);

        return redirect()->route(
            'employees.show',
            ['employee' => $employee->id]
        );
    }

    public function show($employee_id): InertiaResponse
    {
        $employee = $this->find_employee->execute(employee_id: $employee_id, load: ['company']);

        return Inertia::render(
            'Employees/Show',
            ['employee' => $employee]
        );
    }

    public function edit($employee_id): InertiaResponse
    {
        $companies = $this->load_all_companies->execute();
        $employee = $this->find_employee->execute(employee_id: $employee_id);

        return Inertia::render(
            'Employees/Edit',
            ['employee' => $employee, 'companies' => $companies]
        );
    }

    public function update(EmployeeRequest $request, $employee_id): RedirectResponse
    {
        $employeeData = EmployeeDataFactory::fromRequest($request);
        $employee = $this->update_employee->execute(employee_id: $employee_id, employeeData: $employeeData);

        return redirect()->route(
            'employees.show',
            ["employee" => $employee->id]
        );
    }

    public function destroy($employee_id)
    {
        $this->delete_employee->execute(employee_id: $employee_id);

        return redirect()
            ->route('employees.index')
            ->with('message', 'Employee Deleted');
    }
}
