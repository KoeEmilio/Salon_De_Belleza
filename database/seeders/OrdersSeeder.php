<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        // Insertamos 20 órdenes
        for ($i = 1; $i <= 20; $i++) {
            DB::table('orders')->insert([
                [
                    'client_id' => ($i % 10) + 1, // Asignamos clientes de 1 a 10 de manera cíclica
                    'employee_id' => 1, // Empleado que registra el pedido
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
