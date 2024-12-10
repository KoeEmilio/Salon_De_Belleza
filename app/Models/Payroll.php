<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $table = 'payroll';

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
        return $this->hasMany(BonusTax::class, 'payroll_id');
    }

   
    public function findPaymentById(int $paymentId): ?PayrollPayment
    {
        return $this->payrollPayments()->find($paymentId);
    }
}
