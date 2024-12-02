<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceDetailsSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $dateGroups = [
            '2024-09' => 5,
            '2024-10' => 5,
            '2024-11' => 10,
        ];

        foreach ($dateGroups as $month => $count) {
            for ($i = 0; $i < $count; $i++) {
                $data[] = [
                    'service_id' => rand(1, 21), // Aleatorio entre 1 y 21
                    'hair_type_id' => rand(1, 4), // Simulando tipos de cabello (1 a 4)
                    'quantity' => rand(1, 3), // Cantidad entre 1 y 3
                    'unit_price' => rand(50, 200), // Precio unitario entre 50 y 200
                    'appointment_id' => rand(1, 10), // Relacionado con citas (1 a 10)
                    'order_id' => rand(1, 5), // Relacionado con pedidos (1 a 5), o null si no aplica
                    'created_at' => now()->modify("$month-" . rand(1, 28) . " " . rand(0, 23) . ":" . rand(0, 59) . ":00"),
                    'updated_at' => now()->modify("$month-" . rand(1, 28) . " " . rand(0, 23) . ":" . rand(0, 59) . ":00"),
                ];
            }
        }

        // Insertar todos los registros en la tabla
        DB::table('service_details')->insert($data);
    }
}
