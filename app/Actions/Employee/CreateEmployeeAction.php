<?php

namespace App\Actions\Employee;

use App\DataTransferObjects\DTOs\EmployeeData;
use App\Models\Employee;

class CreateEmployeeAction
{
    public function execute(EmployeeData $employeeData)
    {
        return Employee::create($employeeData->toArray());
    }
}