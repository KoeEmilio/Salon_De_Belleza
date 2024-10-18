<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusTax extends Model
{
    use HasFactory;

    protected $table = 'bonuses_tax';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
