<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchedulesSeeder extends Seeder
{
    public function run()
    {
        $days = [
            'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'
        ];

        foreach ($days as $day) {
            DB::table('schedules')->insert([
                'day' => $day,
                'opening_time' => '08:00:00',
                'closing_time' => '22:00:00',
            ]);
        }
    }
}
