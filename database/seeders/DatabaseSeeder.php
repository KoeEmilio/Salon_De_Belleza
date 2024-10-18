<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Primero, llama al RoleSeeder
        $this->call(RoleSeeder::class);

        // Luego, llama al UserSeeder
        $this->call(UserSeeder::class);  
    }
}
