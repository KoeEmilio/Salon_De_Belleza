<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentsSeeder extends Seeder
{
    public function run()
    {
        DB::table('appointments')->insert([
            // Cita del padre
            [
                'sign_up_date' => now(),
                'appointment_day' => '2024-12-01',
                'appointment_time' => '10:00:00',
                'owner_id' => 1, // ID del padre
                'status' => 'pendiente',
                'payment_type' => 'efectivo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Cita de la hija 1 (registrada bajo el padre)
            [
                'sign_up_date' => now(),
                'appointment_day' => '2024-12-01',
                'appointment_time' => '11:00:00',
                'owner_id' => 1, // ID del padre
                'status' => 'pendiente',
                'payment_type' => 'transferencia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Cita de la hija 2 (registrada bajo el padre)
            [
                'sign_up_date' => now(),
                'appointment_day' => '2024-12-01',
                'appointment_time' => '12:00:00',
                'owner_id' => 1, // ID del padre
                'status' => 'pendiente',
                'payment_type' => 'efectivo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

