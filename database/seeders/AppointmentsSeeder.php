<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentsSeeder extends Seeder
{
    public function run()
    {
        // Citas de las 10 personas
        for ($i = 1; $i <= 10; $i++) {
            DB::table('appointments')->insert([
                [
                    'sign_up_date' => now(),
                    'appointment_day' => '2024-12-01',
                    'appointment_time' => '10:00:00',
                    'owner_id' => $i, // Asignamos una cita a cada persona
                    'status' => 'pendiente',
                    'payment_type' => 'efectivo',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'sign_up_date' => now(),
                    'appointment_day' => '2024-12-01',
                    'appointment_time' => '11:00:00',
                    'owner_id' => $i, // Cita de la misma persona
                    'status' => 'pendiente',
                    'payment_type' => 'transferencia',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
