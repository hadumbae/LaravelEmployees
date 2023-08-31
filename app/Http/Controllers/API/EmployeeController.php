<?php

namespace App\Http\Controllers\API;

use App\Actions\Employee\CreateEmployeeAction;
use App\Actions\Employee\DeleteEmployeeAction;
use App\Actions\Employee\FindEmployeeAction;
use App\Actions\Employee\LoadAllEmployeesAction;
use App\Actions\Employee\PaginateEmployeesAction;
use App\Actions\Employee\UpdateEmployeeAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeActionRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Database\Factories\EmployeeFactory;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $paginate_employees;
    private $load_all_employees;
    private $create_employee;
    private $find_employee;
    private $update_employee;
    private $delete_employee;

    public function __construct(
        PaginateEmployeesAction $paginate_employees,
        LoadAllEmployeesAction $load_all_employees,
        CreateEmployeeAction $create_employee,
        FindEmployeeAction $find_employee,
        UpdateEmployeeAction $update_employee,
        DeleteEmployeeAction $delete_employee
    ) {
        $this->paginate_employees = $paginate_employees;
        $this->load_all_employees = $load_all_employees;
        $this->create_employee = $create_employee;
        $this->find_employee = $find_employee;
        $this->update_employee = $update_employee;
        $this->delete_employee = $delete_employee;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EmployeeResource::collection($this->paginate_employees->execute(number_per_page: 10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        return $this->create_employee->execute($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->find_employee->execute($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeActionRequest $request, string $id)
    {
        return $this->update_employee->execute($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->delete_employee->execute($id);
    }
}
