<?php

namespace App\Actions\Company;

use App\Models\Company;

class PaginateCompaniesAction
{
    public function execute($number_per_page)
    {
        return Company::paginate($number_per_page);
    }
}