<?php


namespace Atw\Admin\Employee\Services;


use Atw\Admin\Company\Models\Company;
use Atw\Admin\Employee\Models\Employee;
use Atw\Base\Traits\RedirectTrait;
use Illuminate\Support\Facades\Storage;


class EmployeeService
{
    use RedirectTrait;
    public function index()
    {
        $employees = Employee::with('company')->paginate(5);
        $companies = Company::get();
        return view('Admin.employee.index',compact('companies','employees'));
    }
    public function store($request)
    {
        $employee = Employee::create($request->only('first_name','last_name','email','phone','company_id'));
        if($employee)
            return $this->RedirectTraitWithMsg('employees.index','success','Your Employee Add Successfully');
        else
            return $this->RedirectTraitWithMsg('employees.index','error','Your Employee Not Add Successfully');


    }
    public function update($request)
    {
        $employee = Employee::findOrFail($request->id);
        $employee->update($request->only('first_name','last_name','email','phone','company_id'));
            if($employee)
                return $this->RedirectTraitWithMsg('employees.index','success','Your Employee Add Successfully');
            else
                return $this->RedirectTraitWithMsg('employees.index','error','Your Employee Not Add Successfully');


    }
    public function destroy($request)
    {

        $employee = Employee::findOrFail($request->id)->delete();
        if($employee)
            return $this->RedirectTraitWithMsg('employees.index','success','Your Employee Add Successfully');
        else
            return $this->RedirectTraitWithMsg('employees.index','error','Your Employee Not Add Successfully');
    }

}
