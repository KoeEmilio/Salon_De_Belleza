<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeShift extends Model
{
    use HasFactory;

    protected $table = 'employee_shift';

    protected $fillable = [
        'employee_id',
        'day',
        'shift_id',
    ];

   
    public function employee()
    {
        return $this->belongsTo(EmployeeData::class, 'employee_id');
    }

 
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }
}
