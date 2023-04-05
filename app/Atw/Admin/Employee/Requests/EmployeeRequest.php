<?php


namespace Atw\Admin\Employee\Requests;


use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'first_name'      => 'required|min:3|max:30|regex:/[^0-9]/',
            'last_name'      => 'required|min:3|max:30|regex:/[^0-9]/',
            'email'     => 'required|unique:employees,email',
            'phone'   => 'required|min:11|max:11|regex:/[0-9]/',
        ];
    }
}
