<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeData extends Model
{
    use HasFactory;

    protected $table = 'employees_data'; // Nombre de la tabla

    protected $fillable = [
        'nss',
        'curp',
        'rfc',
        'address',
        'status',
        'person_id',
        'base_salary',
    ];


    public function person()
{
    return $this->belongsTo(PeopleData::class, 'person_id');
}

    public function employeeShifts()
    {
        return $this->hasMany(EmployeeShift::class, 'employee_id');
    }


    public function hoursWorked()
    {
        return $this->hasMany(EmployeeHour::class, 'employee_id');
    }


    public function bonusesTax()
    {
        return $this->hasMany(BonusTax::class, 'employee_id');
    }

 
    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'employee_id');
    }


    public function orders()
    {
        return $this->hasMany(Order::class, 'employee_id');
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'employee_id');
    }
}
