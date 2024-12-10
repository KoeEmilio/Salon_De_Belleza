<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    public function run()
    {
        $shifts = [
            [
                'shift' => 'Mañana',
                'entry_time' => '08:00:00',
                'exit_time' => '15:00:00',
            ],
            [
                'shift' => 'Tarde',
                'entry_time' => '15:00:00',
                'exit_time' => '22:00:00',
            ]
        ];

        foreach ($shifts as $shift) {
            DB::table('shifts')->insert([
                'shift' => $shift['shift'],
                'entry_time' => $shift['entry_time'],
                'exit_time' => $shift['exit_time'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
