<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesDataSeeder extends Seeder
{
    public function run()
    {
        $employeesData = [
            [
                'nss' => '123456789012345',
                'curp' => 'AABM123456HDFRRS09',
                'rfc' => 'AABM123456RF',
                'address' => 'Av. Reforma 123, Ciudad de México',
                'status' => 'Activo',
                'person_id' => 2, 
                'base_salary' => 15000.00,
            ],
            [
                'nss' => '123456789012346',
                'curp' => 'AABM123456HDFRRS10',
                'rfc' => 'AABM123456RF',
                'address' => 'Calle Falsa 456, Guadalajara',
                'status' => 'Activo',
                'person_id' => 3,
                'base_salary' => 15500.00,
            ],
            [
                'nss' => '123456789012347',
                'curp' => 'AABM123456HDFRRS11',
                'rfc' => 'AABM123456RF',
                'address' => 'Calle 5 de Febrero 789, Monterrey',
                'status' => 'Activo',
                'person_id' => 4, 
                'base_salary' => 16000.00,
            ],
            [
                'nss' => '123456789012348',
                'curp' => 'AABM123456HDFRRS12',
                'rfc' => 'AABM123456RF',
                'address' => 'Avenida Insurgentes 101, Ciudad de México',
                'status' => 'Activo',
                'person_id' => 5, 
                'base_salary' => 15000.00,
            ],
            [
                'nss' => '123456789012349',
                'curp' => 'AABM123456HDFRRS13',
                'rfc' => 'AABM123456RF',
                'address' => 'Calle Juárez 505, Querétaro',
                'status' => 'Activo',
                'person_id' => 6, 
                'base_salary' => 15800.00,
            ],
            [
                'nss' => '123456789012350',
                'curp' => 'AABM123456HDFRRS14',
                'rfc' => 'AABM123456RF',
                'address' => 'Calle del Sol 321, Puebla',
                'status' => 'Activo',
                'person_id' => 7, 
                'base_salary' => 15000.00,
            ],
            [
                'nss' => '123456789012351',
                'curp' => 'AABM123456HDFRRS15',
                'rfc' => 'AABM123456RF',
                'address' => 'Av. Las Américas 123, Ciudad de México',
                'status' => 'Activo',
                'person_id' => 8, 
                'base_salary' => 13000.00,
            ],
            [
                'nss' => '123456789012352',
                'curp' => 'AABM123456HDFRRS16',
                'rfc' => 'AABM123456RF',
                'address' => 'Calle de la Luna 456, Guadalajara',
                'status' => 'Activo',
                'person_id' => 9, 
                'base_salary' => 13500.00,
            ]
        ];

        foreach ($employeesData as $data) {
            DB::table('employees_data')->insert([
                'nss' => $data['nss'],
                'curp' => $data['curp'],
                'rfc' => $data['rfc'],
                'address' => $data['address'],
                'status' => $data['status'],
                'person_id' => $data['person_id'],
                'base_salary' => $data['base_salary'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
