<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HairTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('hair_type')->insert([
            [
                'type' => 'Lacio',
                'price' => 50.00, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Ondulado',
                'price' => 60.00, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Rizado',
                'price' => 70.00, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'No aplica',
                'price' => 0.00, // O el valor que prefieras
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
