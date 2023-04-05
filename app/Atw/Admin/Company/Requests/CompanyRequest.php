<?php


namespace Atw\Admin\Company\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'company_name'      => 'required|min:3|max:30|regex:/[^0-9]/',
            'company_email'     => 'required|unique:companies,email',
            'company_website'   => 'required|regex:/[^0-9]/',
            'company_logo'      => 'required'
        ];
    }
}
