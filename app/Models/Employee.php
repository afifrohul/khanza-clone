<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employeePosition()
    {
        return $this->belongsTo(EmployeePosition::class);
    }

    public function employeeMedicalPersonnel()
    {
        return $this->hasOne(EmployeeMedicalPersonnel::class);
    }
}
