<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Atw\Admin\Employee\Requests\EmployeeRequest;
use Atw\Admin\Employee\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private EmployeeService $employe;
    public function __construct(EmployeeService $employe)
    {
        $this->employe = $employe;
    }
    public function index()
    {
        return $this->employe->index();
    }


    public function store(EmployeeRequest $request)
    {
        return $this->employe->store($request);
    }

    public function update(EmployeeRequest $request)
    {

        return $this->employe->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->employe->destroy($request);
    }
}
