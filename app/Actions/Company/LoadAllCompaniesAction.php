<?php

namespace App\Actions\Company;

use App\Models\Company;

class LoadAllCompaniesAction
{
    public function execute()
    {
        return Company::all();
    }
}