<?php


namespace Atw\Admin\Company\Services;


use Atw\Admin\Company\Models\Company;
use Atw\Base\Traits\RedirectTrait;
use Illuminate\Support\Facades\Storage;
use Image;

class CompanyService
{
    use RedirectTrait;
    public function index()
    {
        $companies = Company::paginate(5);
        return view('Admin.company.index',compact('companies'));
    }
    public function store($request)
    {
        if($request->hasFile('company_logo'))
        {
            $file = $request->file('company_logo');
            $name = time().'_'.$file->getClientOriginalName();
            $file->storeAs('image/'.time(),$name,'public');
            $file->move(public_path('image/'.time()),$name);

            $company = Company::create([
                'name'      => $request->company_name,
                'email'      => $request->company_email,
                'website'      => $request->company_website,
                'logo'=>$name
            ]);
            if($company)
                return $this->RedirectTraitWithMsg('companies.index','success','Your Company Add Successfully');
            else
                return $this->RedirectTraitWithMsg('companies.index','error','Your Company Not Add Successfully');
        }


    }
    public function update($request)
    {

        if($request->hasFile('company_logo'))
        {
            $company = Company::findOrFail($request->id);
            $file = $request->file('company_logo');
            $name = time().'_'.$file->getClientOriginalName();
            $file->storeAs('image/'.time(),$name,'public');
            $file->move(public_path('image/'.time()),$name);


            $company->update([
                'name'      => $request->company_name,
                'email'      => $request->company_email,
                'website'      => $request->company_website,
                'logo'=>$name
            ]);
            if($company)
                return $this->RedirectTraitWithMsg('companies.index','success','Your Company Add Successfully');
            else
                return $this->RedirectTraitWithMsg('companies.index','error','Your Company Not Add Successfully');
        }
        else
            return $this->RedirectTraitWithMsg('companies.index','error','Your Company Not Add Successfully');


    }
    public function destroy($request)
    {

        $company = Company::findOrFail($request->id)->delete();
        if($company)
            return $this->RedirectTraitWithMsg('companies.index','success','Your Company Add Successfully');
        else
            return $this->RedirectTraitWithMsg('companies.index','error','Your Company Not Add Successfully');
    }

}
