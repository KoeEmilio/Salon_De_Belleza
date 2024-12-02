<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'payroll';

    // Campos que son asignables
    protected $fillable = [
        'employee_id',
        'period_start',
        'period_end',
        'total_hours_worked',
        'overtime_hours',
        'bonuses',
        'tax',
        'net_salary',
        'payment_status',
    ];

    // Relación con EmployeeData
    public function employee()
    {
        return $this->belongsTo(EmployeeData::class, 'employee_id');
    }
    public function payrollPayments()
{
    return $this->hasMany(PayrollPayment::class, 'payroll_id');
}
public function payrollBonusesTaxes()
{
    return $this->hasMany(BonusTax::class, 'payroll_id'); // Asegúrate de que 'payroll_id' sea el nombre correcto
}

}
