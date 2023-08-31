<?php

namespace App\Actions\Employee;

use App\Models\Employee;

class DeleteEmployeeAction
{
    public function execute($employee_id)
    {
        $record = Employee::findOrFail($employee_id);
        return $record->delete();
    }
}
