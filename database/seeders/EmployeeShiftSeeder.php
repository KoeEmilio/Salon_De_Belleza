<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeShiftSeeder extends Seeder
{
    public function run()
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        $employees = [
            ['employee_id' => 1, 'shift_id' => 1, 'name' => 'Juan Pérez', 'shift' => 'Mañana'],
            ['employee_id' => 2, 'shift_id' => 1, 'name' => 'Ana Gómez', 'shift' => 'Mañana'],
            ['employee_id' => 3, 'shift_id' => 1, 'name' => 'Carlos López', 'shift' => 'Mañana'],
            ['employee_id' => 4, 'shift_id' => 2, 'name' => 'Laura Martínez', 'shift' => 'Tarde'],
            ['employee_id' => 5, 'shift_id' => 2, 'name' => 'José Sánchez', 'shift' => 'Tarde'],
            ['employee_id' => 6, 'shift_id' => 2, 'name' => 'María Torres', 'shift' => 'Tarde'],
            ['employee_id' => 7, 'shift_id' => 1, 'name' => 'Pablo Ruiz', 'shift' => 'Mañana'], 
            ['employee_id' => 8, 'shift_id' => 2, 'name' => 'Marta Pérez', 'shift' => 'Tarde'],  
        ];

        foreach ($employees as $employee) {
            foreach ($days as $day) {
                DB::table('employee_shift')->insert([
                    'employee_id' => $employee['employee_id'],
                    'day' => $day,
                    'shift_id' => $employee['shift_id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
