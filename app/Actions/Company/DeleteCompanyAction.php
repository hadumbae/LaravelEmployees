<?php

namespace App\Actions\Company;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class DeleteCompanyAction
{
    public function execute($company_id)
    {
        $record = Company::findOrFail($company_id);
        Storage::delete("public/Company/Logos/{$record->id}/{$record->logo}");
        return $record->delete();
    }
}
