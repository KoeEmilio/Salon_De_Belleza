<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeHour extends Model
{
    use HasFactory;

    protected $table = 'employee_hours';


    protected $fillable = [
        'employee_id',
        'date_worked',
        'start_time',
        'end_time',
        'overtime_hours',
    ];

    
    public function employee()
    {
        return $this->belongsTo(EmployeeData::class, 'employee_id');
    }
}
