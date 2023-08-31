<?php

namespace App\Http\Controllers\API;

use App\Actions\Company\CreateCompanyAction;
use App\Actions\Company\DeleteCompanyAction;
use App\Actions\Company\FindCompanyAction;
use App\Actions\Company\LoadAllCompaniesAction;
use App\Actions\Company\PaginateCompaniesAction;
use App\Actions\Company\UpdateCompanyAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyActionRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Database\Factories\CompanyFactory;
use Illuminate\Http\Request;

class CompanyController extends Controller
{


    public function __construct(
        private PaginateCompaniesAction $paginate_companies,
        private LoadAllCompaniesAction $load_all_companies,
        private CreateCompanyAction $create_company,
        private FindCompanyAction $find_company,
        private UpdateCompanyAction $update_company,
        private DeleteCompanyAction $delete_company
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CompanyResource::collection($this->paginate_companies->execute(number_per_page: 10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        return $this->create_company->execute($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->find_company->execute($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyActionRequest $request, string $id)
    {
        return $this->update_company->execute($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->delete_company->execute($id);
    }
}
