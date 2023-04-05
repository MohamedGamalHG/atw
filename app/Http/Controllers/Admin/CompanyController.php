<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Atw\Admin\Company\Requests\CompanyRequest;
use Atw\Admin\Company\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private CompanyService $company;
    public function __construct(CompanyService $company)
    {
        $this->company = $company;
    }
    public function index()
    {
        return $this->company->index();
    }


    public function store(CompanyRequest $request)
    {
        return $this->company->store($request);
    }

    public function update(CompanyRequest $request)
    {

        return $this->company->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->company->destroy($request);
    }
}
