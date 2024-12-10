<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersAppointmentsSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $clientId = ($i % 10) + 1; 

            DB::table('orders_appointments')->insert([
                [
                    'order_id' => $i, 
                    'appointment_id' => ($clientId - 1) * 2 + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'order_id' => $i, 
                    'appointment_id' => ($clientId - 1) * 2 + 2, 
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
