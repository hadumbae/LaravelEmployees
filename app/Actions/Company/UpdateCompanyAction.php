<?php

namespace App\Actions\Company;

use App\DataTransferObjects\DTOs\CompanyData;
use App\Models\Company;

class UpdateCompanyAction
{
    public function execute(int $company_id, CompanyData $companyData)
    {
        $record = Company::findOrFail($company_id);
        $record->update($companyData->toArray());

        return $record;
    }
}
