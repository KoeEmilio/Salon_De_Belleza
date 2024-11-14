<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;


    protected $table = 'shifts';

    protected $fillable = [
        'shift',
        'entry_time',
        'exit_time',
    ];
    public function employeeShifts()
{
    return $this->hasMany(EmployeeShift::class, 'shift_id');
}
}
