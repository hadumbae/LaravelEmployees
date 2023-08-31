<?php

namespace App\Actions\Company;

use App\Models\Company;

class FindCompanyAction
{
    public function execute($company_id, $load = [])
    {
        return Company::findOrFail($company_id)->load($load);
    }
}