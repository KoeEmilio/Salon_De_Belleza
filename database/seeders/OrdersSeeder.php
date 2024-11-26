<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
                'client_id' => 1, // ID del padre
                'employee_id' => 1, // ID del empleado que registró el pedido
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

