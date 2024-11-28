<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersAppointmentsSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $clientId = ($i % 10) + 1; // Asignamos clientes de 1 a 10 de manera cíclica

            // Citas asignadas a cada orden
            DB::table('orders_appointments')->insert([
                [
                    'order_id' => $i, // ID de la orden
                    'appointment_id' => ($clientId - 1) * 2 + 1, // Cita 1 para cada cliente
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'order_id' => $i, // ID de la orden
                    'appointment_id' => ($clientId - 1) * 2 + 2, // Cita 2 para cada cliente
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
