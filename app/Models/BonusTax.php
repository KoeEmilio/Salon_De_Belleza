<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusTax extends Model
{
    use HasFactory;

    protected $table = 'bonuses_tax';

    protected $fillable = [
        'employee_id',
        'date_recorded',
        'type',
        'description',
        'amount',
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeeData::class, 'employee_id');
    }
    public function payroll()
{
    return $this->belongsTo(Payroll::class, 'payroll_id'); 
}

}
