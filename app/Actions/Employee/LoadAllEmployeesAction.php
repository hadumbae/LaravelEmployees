<?php

namespace App\Actions\Employee;

use App\Models\Employee;

class LoadAllEmployeesAction
{
    public function execute()
    {
        return Employee::all();
    }
}
