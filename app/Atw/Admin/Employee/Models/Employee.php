<?php

namespace Atw\Admin\Employee\Models;

use Atw\Admin\Company\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name','email','company_id','phone'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
