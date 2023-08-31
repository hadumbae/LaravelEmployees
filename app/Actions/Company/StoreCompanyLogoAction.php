<?php

namespace App\Actions\Company;

use Illuminate\Support\Facades\Storage;

class StoreCompanyLogoAction
{
    public function execute($company_id, $file)
    {
        if ($file) {
            $filename = $file->getClientOriginalName();
            $path = "public/Company/Logos/{$company_id}";

            Storage::putFileAs($path, $file, $filename);
        }
    }
}