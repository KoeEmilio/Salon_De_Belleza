<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $table = 'payroll';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
