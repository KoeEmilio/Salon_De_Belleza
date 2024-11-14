<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusTax extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'bonuses_tax';

    // Campos que son asignables
    protected $fillable = [
        'employee_id',
        'date_recorded',
        'type',
        'description',
        'amount',
    ];

    // Relación con el modelo EmployeeData
    public function employee()
    {
        return $this->belongsTo(EmployeeData::class, 'employee_id');
    }
}
