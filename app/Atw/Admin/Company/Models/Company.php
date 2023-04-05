<?php

namespace Atw\Admin\Company\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name','logo','website','email'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
