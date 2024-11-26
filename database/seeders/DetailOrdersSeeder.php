<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailOrdersSeeder extends Seeder
{
    public function run()
    {
        DB::table('detail_orders')->insert([
            [
                'order_id' => 1, // Pedido del padre
                'service_id' => 1, // Servicio realizado durante la cita
                'description' => 'Corte de cabello',
                'quantity' => 1,
                'unit_price' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 1, // Pedido del padre
                'service_id' => 2, // Servicio realizado durante la cita
                'description' => 'Peinado para niña',
                'quantity' => 2,
                'unit_price' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
