<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeHoursSeeder extends Seeder
{
    public function run()
    {
        $daysOfWeek = [
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
        ];

        $employees = [
            ['employee_id' => 1, 'shift' => 'Mañana'], 
            ['employee_id' => 2, 'shift' => 'Mañana'],
            ['employee_id' => 3, 'shift' => 'Mañana'],
            ['employee_id' => 4, 'shift' => 'afternoon'], 
            ['employee_id' => 5, 'shift' => 'afternoon'],
            ['employee_id' => 6, 'shift' => 'afternoon'],
            ['employee_id' => 7, 'shift' => 'Mañana'],
            ['employee_id' => 8, 'shift' => 'afternoon'], 
        ];

        foreach ($employees as $employee) {
            foreach ($daysOfWeek as $day) {
                $date = Carbon::parse("next $day"); 
                $start_time = $employee['shift'] == 'Mañana' ? '08:00:00' : '15:00:00';
                $end_time = $employee['shift'] == 'Mañana' ? '15:00:00' : '22:00:00';
                $overtime_hours = 0;
                if ($employee['employee_id'] == 1 && $day == 'Tuesday') { 
                    $overtime_hours = 2;
                }

                DB::table('employee_hours')->insert([
                    'employee_id' => $employee['employee_id'],
                    'date_worked' => $date,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'hours_worked' => 7,  
                    'overtime_hours' => $overtime_hours,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
