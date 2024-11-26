<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeServiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('type_service')->insert([
            ['type' => 'MAQUILLAJES', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'DISEÑO DE CEJA', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'PAQUETES', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'MESOTERAPIA CORPORAL', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'CABELLO', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
