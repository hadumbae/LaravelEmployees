<?php

namespace App\Actions\Employee;

use App\Models\Employee;

class PaginateEmployeesAction
{
    public function execute($number_per_page, $load = [])
    {
        return Employee::with($load)->paginate($number_per_page);
    }
}