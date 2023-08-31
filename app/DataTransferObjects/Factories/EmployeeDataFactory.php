<?php

namespace App\DataTransferObjects\Factories;

use App\DataTransferObjects\DTOs\EmployeeData;
use App\Http\Requests\EmployeeRequest;

class EmployeeDataFactory
{
    public static function fromRequest(EmployeeRequest $request)
    {
        return new EmployeeData(...$request->validated());
    }
}
