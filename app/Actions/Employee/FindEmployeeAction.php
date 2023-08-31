<?php

namespace App\Actions\Employee;

use App\Models\Employee;

class FindEmployeeAction
{
    public function execute($employee_id, $load = [])
    {
        return Employee::findOrFail($employee_id)->load($load);
    }
}
