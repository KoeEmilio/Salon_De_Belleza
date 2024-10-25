<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $table = 'shifts';

    protected $fillable = [
        'shift',
        'entry_time',
        'exit_time'
    ];

    public function employees()
    {
        return $this->hasMany(EmployeeShift::class);
    }
}
