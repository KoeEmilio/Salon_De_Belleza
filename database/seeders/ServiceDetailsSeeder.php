<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceDetailsSeeder extends Seeder
{
    public function run()
    {
        DB::table('service_details')->insert([
            // Servicio realizado durante una cita
            [
                'service_id' => 1, // ID del servicio
                'hair_type_id' => 1, // Tipo de cabello
                'quantity' => 1,
                'unit_price' => 100.00,
                'appointment_id' => 1, // Servicio realizado durante la cita del padre
                'order_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Servicio realizado sin cita
            [
                'service_id' => 2, // ID del servicio
                'hair_type_id' => 2, // Tipo de cabello
                'quantity' => 2,
                'unit_price' => 50.00,
                'appointment_id' => null, // Sin cita
                'order_id' => null, // Sin pedido relacionado
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
