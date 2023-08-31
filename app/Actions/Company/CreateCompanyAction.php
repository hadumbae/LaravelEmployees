<?php

namespace App\Actions\Company;

use App\DataTransferObjects\DTOs\CompanyData;
use App\Models\Company;

class CreateCompanyAction
{
    public function execute(CompanyData $companyData)
    {
        return Company::create($companyData->toArray());
    }
}
