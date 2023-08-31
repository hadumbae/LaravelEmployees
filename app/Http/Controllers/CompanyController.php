<?php

namespace App\Http\Controllers;

use App\Actions\Company\CreateCompanyAction;
use App\Actions\Company\DeleteCompanyAction;
use App\Actions\Company\FindCompanyAction;
use App\Actions\Company\PaginateCompaniesAction;
use App\Actions\Company\StoreCompanyLogoAction;
use App\Actions\Company\UpdateCompanyAction;
use App\DataTransferObjects\Factories\CompanyDataFactory;
use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyActionRequest;
use App\Http\Requests\CompanyRequest;
use Database\Factories\CompanyFactory;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class CompanyController extends Controller
{
    public function __construct(
        private PaginateCompaniesAction $paginate_companies,
        private CreateCompanyAction $create_company,
        private FindCompanyAction $find_company,
        private UpdateCompanyAction $update_company,
        private DeleteCompanyAction $delete_company,
        private StoreCompanyLogoAction $store_logo
    ) {
    }

    public function index(): InertiaResponse
    {
        $companies = $this->paginate_companies->execute(number_per_page: 10);

        return Inertia::render(
            'Company/Index',
            ['companies' => $companies]
        );
    }

    public function create(): InertiaResponse
    {
        return Inertia::render("Company/Create");
    }

    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        $companyData = CompanyDataFactory::fromRequest($request);
        $company = $this->create_company->execute(companyData: $companyData);
        $this->store_logo->execute(company_id: $company->id, file: $request->file('logoFile'));

        return redirect()->route(
            'companies.show',
            ['company' => $company->id]
        );
    }

    public function show($company_id): InertiaResponse
    {
        $company = $this->find_company->execute(company_id: $company_id, load: ['employees']);

        return Inertia::render(
            'Company/Show',
            ['company' => $company]
        );
    }

    public function edit($company_id): InertiaResponse
    {
        $company = $this->find_company->execute(company_id: $company_id);

        return Inertia::render(
            'Company/Edit',
            ['company' => $company]
        );
    }

    public function update(CompanyRequest $request, $company_id): RedirectResponse
    {
        $companyData = CompanyDataFactory::fromRequest($request);
        $company = $this->update_company->execute(company_id: $company_id, companyData: $companyData);

        return redirect()->route(
            'companies.show',
            ["company" => $company->id]
        );
    }

    public function destroy($company_id)
    {
        $this->delete_company->execute(company_id: $company_id);

        return redirect()
            ->route('companies.index')
            ->with('message', 'Company Deleted');
    }
}
