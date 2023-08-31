<?php

namespace App\Actions\Employee;

use App\DataTransferObjects\DTOs\EmployeeData;
use App\Models\Employee;

class UpdateEmployeeAction
{
    public function execute(int $employee_id, EmployeeData $employeeData)
    {
        $record = Employee::findOrFail($employee_id);
        $record->update($employeeData->toArray());

        return $record;
    }
}
