<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $month = $i <= 10 ? 10 : ($i <= 15 ? 11 : 12); 
            $day = rand(1, 28); 

            DB::table('orders')->insert([
                [
                    'client_id' => ($i % 10) + 1,
                    'employee_id' => 1, 
                    'created_at' => Carbon::create(2024, $month, $day)->toDateTimeString(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
