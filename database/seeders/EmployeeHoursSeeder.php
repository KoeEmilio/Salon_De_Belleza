<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeHoursSeeder extends Seeder
{
    public function run()
    {
        // Fechas de la semana (lunes a sábado)
        $daysOfWeek = [
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
        ];

        // Empleados en los turnos (estos ids deben corresponder con los empleados de la tabla 'employees_data')
        $employees = [
            // Mañana: 8:00am a 15:00pm
            ['employee_id' => 1, 'shift' => 'Mañana'], // Ejemplo para empleado 1
            ['employee_id' => 2, 'shift' => 'Mañana'],
            ['employee_id' => 3, 'shift' => 'Mañana'],
            // Tarde: 15:00pm a 22:00pm
            ['employee_id' => 4, 'shift' => 'afternoon'], // Ejemplo para empleado 4
            ['employee_id' => 5, 'shift' => 'afternoon'],
            ['employee_id' => 6, 'shift' => 'afternoon'],
            // Recepcionistas (uno en cada turno)
            ['employee_id' => 7, 'shift' => 'Mañana'], // Recepcionista 1
            ['employee_id' => 8, 'shift' => 'afternoon'], // Recepcionista 2
        ];

        foreach ($employees as $employee) {
            foreach ($daysOfWeek as $day) {
                $date = Carbon::parse("next $day"); // Fecha para el próximo día específico de la semana
                $start_time = $employee['shift'] == 'Mañana' ? '08:00:00' : '15:00:00';
                $end_time = $employee['shift'] == 'Mañana' ? '15:00:00' : '22:00:00';

                // Si el empleado tiene horas extra (solo unos pocos para demostrar)
                $overtime_hours = 0;
                if ($employee['employee_id'] == 1 && $day == 'Tuesday') { // Ejemplo de horas extra para el empleado 1 el martes
                    $overtime_hours = 2;
                }

                DB::table('employee_hours')->insert([
                    'employee_id' => $employee['employee_id'],
                    'date_worked' => $date,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'hours_worked' => 7,  // 7 horas de trabajo por turno
                    'overtime_hours' => $overtime_hours,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
