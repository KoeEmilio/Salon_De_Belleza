<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailOrdersSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('detail_orders')->insert([
                [
                    'order_id' => $i, // Orden del cliente
                    'service_id' => 1, // Servicio realizado (por ejemplo, corte de cabello)
                    'description' => 'Corte de cabello',
                    'quantity' => 1,
                    'unit_price' => 100.00,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'order_id' => $i, // Orden del cliente
                    'service_id' => 2, // Servicio realizado (por ejemplo, peinado)
                    'description' => 'Peinado para niña',
                    'quantity' => 2,
                    'unit_price' => 50.00,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
