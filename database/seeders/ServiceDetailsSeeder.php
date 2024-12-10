<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                $day = rand(1, 28);
                $hour = rand(0, 23);
                $minute = sprintf('%02d', rand(0, 59)); 
                $second = sprintf('%02d', rand(0, 59)); 
                $createdAt = Carbon::createFromFormat('Y-m-d H:i:s', "$month-$day $hour:$minute:$second");

                $data[] = [
                    'service_id' => rand(1, 21),
                    'hair_type_id' => rand(1, 4),
                    'quantity' => rand(1, 3),
                    'unit_price' => rand(50, 200),
                    'appointment_id' => rand(1, 10),
                    'order_id' => ($month === '2024-11' ? rand(1, 20) : rand(1, 15)),
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ];
            }
        }

        DB::table('service_details')->insert($data);
    }
}
