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
                'type' => 'Lacio Largo',
                'price' => 50.00, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Lacio Corto',
                'price' => 60.00, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Chino Largo',
                'price' => 50.00, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Chino Corto',
                'price' => 60.00, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Ondulado Largo',
                'price' => 50.00, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Ondulado Corto',
                'price' => 60.00, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Crespo Largo',
                'price' => 50.00, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Crespo Corto',
                'price' => 60.00, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'No Aplica',
                'price' => 00.00, 
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
