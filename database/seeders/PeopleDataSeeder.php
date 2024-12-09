<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleDataSeeder extends Seeder
{
    public function run()
    {
        $peopleData = [
            // Administrador
            [
                'first_name' => 'Carlos',
                'last_name' => 'Torres',
                'age' => 34,
                'gender' => 'H',
                'phone' => '1234567890',
                'user_id' => 1, 
            ],
            // Empleados
            [
                'first_name' => 'María',
                'last_name' => 'López',
                'age' => 28,
                'gender' => 'M',
                'phone' => '1234567891',
                'user_id' => 2, 
            ],
            [
                'first_name' => 'Juan',
                'last_name' => 'Pérez',
                'age' => 30,
                'gender' => 'H',
                'phone' => '1234567892',
                'user_id' => 3,
            ],
            [
                'first_name' => 'Sofía',
                'last_name' => 'Martínez',
                'age' => 25,
                'gender' => 'M',
                'phone' => '1234567893',
                'user_id' => 4,
            ],
            [
                'first_name' => 'Luis',
                'last_name' => 'Ramírez',
                'age' => 35,
                'gender' => 'H',
                'phone' => '1234567894',
                'user_id' => 5,
            ],
            [
                'first_name' => 'Ana',
                'last_name' => 'Gómez',
                'age' => 27,
                'gender' => 'M',
                'phone' => '1234567895',
                'user_id' => 6,
            ],
            [
                'first_name' => 'Diego',
                'last_name' => 'Fernández',
                'age' => 32,
                'gender' => 'H',
                'phone' => '1234567896',
                'user_id' => 7,
            ],
            // Recepcionistas
            [
                'first_name' => 'Laura',
                'last_name' => 'Sánchez',
                'age' => 26,
                'gender' => 'M',
                'phone' => '1234567897',
                'user_id' => 8,
            ],
            [
                'first_name' => 'Jorge',
                'last_name' => 'Herrera',
                'age' => 29,
                'gender' => 'H',
                'phone' => '1234567898',
                'user_id' => 9,
            ],
            // Clientes
            [
                'first_name' => 'Gabriela',
                'last_name' => 'Cruz',
                'age' => 24,
                'gender' => 'M',
                'phone' => '1234567899',
                'user_id' => 10,
            ],
            [
                'first_name' => 'Roberto',
                'last_name' => 'Castillo',
                'age' => 33,
                'gender' => 'H',
                'phone' => '1234567800',
                'user_id' => 11,
            ],
            [
                'first_name' => 'Isabel',
                'last_name' => 'Ortega',
                'age' => 31,
                'gender' => 'M',
                'phone' => '1234567801',
                'user_id' => 12,
            ],
            [
                'first_name' => 'Pedro',
                'last_name' => 'Gutiérrez',
                'age' => 28,
                'gender' => 'H',
                'phone' => '1234567802',
                'user_id' => 13,
            ],
        ];

        foreach ($peopleData as $data) {
            DB::table('people_data')->insert([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'age' => $data['age'],
                'gender' => $data['gender'],
                'phone' => $data['phone'],
                'user_id' => $data['user_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
