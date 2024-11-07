<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeHour extends Model
{
    protected $table = 'employee_hours';

    protected $fillable = [
        'employee_id',
        'date_worked',
        'start_time',
        'end_time',
        'hours_worked',
        'overtime_hours'
    ];

    // Deshabilitar timestamps automáticos si no se utilizan
    public $timestamps = false;

    // Relación con el modelo de empleados
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    // Método para calcular las horas trabajadas
    public function calculateHoursWorked()
    {
        $startTime = strtotime($this->start_time);
        $endTime = strtotime($this->end_time);
        $hoursWorked = ($endTime - $startTime) / 3600;  // Conversión de segundos a horas

        return round($hoursWorked, 2);  // Redondeo a dos decimales
    }

    // Método para definir las horas extra, si se necesitan en el modelo
    public function calculateOvertime($standardHours = 8)
    {
        $hoursWorked = $this->calculateHoursWorked();
        $overtime = max(0, $hoursWorked - $standardHours);  // Horas extra sólo si exceden el estándar

        return round($overtime, 2);
    }
}
