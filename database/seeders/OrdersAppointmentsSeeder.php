<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersAppointmentsSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders_appointments')->insert([
            [
                'order_id' => 1, // Pedido del padre
                'appointment_id' => 1, // Cita del padre
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 1, // Pedido del padre
                'appointment_id' => 2, // Cita de la hija 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 1, // Pedido del padre
                'appointment_id' => 3, // Cita de la hija 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
