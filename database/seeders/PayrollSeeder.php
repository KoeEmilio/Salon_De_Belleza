<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PayrollSeeder extends Seeder
{
    public function run()
    {
        $period_start = Carbon::create(2024, 11, 26);
        $period_end = Carbon::create(2024, 12, 05);

        DB::table('payroll')->insert([
            ['employee_id' => 1, 'period_start' => $period_start, 'period_end' => $period_end, 'total_hours_worked' => 0, 'overtime_hours' => 0, 'bonuses' => 0, 'tax' => 0, 'net_salary' => 0, 'payment_status' => 'Pendiente'],
            ['employee_id' => 2, 'period_start' => $period_start, 'period_end' => $period_end, 'total_hours_worked' => 0, 'overtime_hours' => 0, 'bonuses' => 0, 'tax' => 0, 'net_salary' => 0, 'payment_status' => 'Pendiente'],
            ['employee_id' => 3, 'period_start' => $period_start, 'period_end' => $period_end, 'total_hours_worked' => 0, 'overtime_hours' => 0, 'bonuses' => 0, 'tax' => 0, 'net_salary' => 0, 'payment_status' => 'Pendiente'],
            ['employee_id' => 4, 'period_start' => $period_start, 'period_end' => $period_end, 'total_hours_worked' => 0, 'overtime_hours' => 0, 'bonuses' => 0, 'tax' => 0, 'net_salary' => 0, 'payment_status' => 'Pendiente'],
            ['employee_id' => 5, 'period_start' => $period_start, 'period_end' => $period_end, 'total_hours_worked' => 0, 'overtime_hours' => 0, 'bonuses' => 0, 'tax' => 0, 'net_salary' => 0, 'payment_status' => 'Pendiente'],
            ['employee_id' => 6, 'period_start' => $period_start, 'period_end' => $period_end, 'total_hours_worked' => 0, 'overtime_hours' => 0, 'bonuses' => 0, 'tax' => 0, 'net_salary' => 0, 'payment_status' => 'Pendiente'],
            ['employee_id' => 7, 'period_start' => $period_start, 'period_end' => $period_end, 'total_hours_worked' => 0, 'overtime_hours' => 0, 'bonuses' => 0, 'tax' => 0, 'net_salary' => 0, 'payment_status' => 'Pendiente'],
            ['employee_id' => 8, 'period_start' => $period_start, 'period_end' => $period_end, 'total_hours_worked' => 0, 'overtime_hours' => 0, 'bonuses' => 0, 'tax' => 0, 'net_salary' => 0, 'payment_status' => 'Pendiente']
        ]);

      
    }
}
