<?php

namespace App\DataTransferObjects\Factories;

use App\DataTransferObjects\DTOs\CompanyData;
use App\Http\Requests\CompanyRequest;

class CompanyDataFactory
{
    public static function fromRequest(CompanyRequest $request): CompanyData
    {
        return new CompanyData(...$request->validated());
    }
}
