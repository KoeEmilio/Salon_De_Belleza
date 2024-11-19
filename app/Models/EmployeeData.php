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
        'person_id', // Relación con la tabla 'people_data'
        'base_salary',
    ];

    // Relación con el modelo PeopleData
    public function peopleData()
{
    return $this->belongsTo(PeopleData::class, 'person_id');
}

    // Relación con los turnos del empleado
    public function employeeShifts()
    {
        return $this->hasMany(EmployeeShift::class, 'employee_id');
    }

    // Relación con las horas trabajadas
    public function hoursWorked()
    {
        return $this->hasMany(EmployeeHour::class, 'employee_id');
    }

    // Relación con los bonos e impuestos del empleado
    public function bonusesTax()
    {
        return $this->hasMany(BonusTax::class, 'employee_id');
    }

    // Relación con las nóminas del empleado
    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'employee_id');
    }

    // Relación con las órdenes del empleado
    public function orders()
    {
        return $this->hasMany(Order::class, 'employee_id');
    }
}
