<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DetailOrdersSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $month = $i <= 10 ? 10 : ($i <= 15 ? 11 : 12);
            $day = rand(1, 28);

            $createdAt = Carbon::create(2024, $month, $day)->toDateTimeString();

            DB::table('detail_orders')->insert([
                [
                    'order_id' => $i, 
                    'service_id' => 1, 
                    'description' => 'Corte de cabello',
                    'quantity' => 1,
                    'unit_price' => 100.00,
                    'created_at' => $createdAt,
                    'updated_at' => now(),
                ],
                [
                    'order_id' => $i, 
                    'service_id' => 2, 
                    'description' => 'Peinado para niña',
                    'quantity' => 2,
                    'unit_price' => 50.00,
                    'created_at' => $createdAt,
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
