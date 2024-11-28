<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesDataSeeder extends Seeder
{
    public function run()
    {
        // Datos de empleados (solo de recepcionistas y empleados)
        $employeesData = [
            // Empleados
            [
                'nss' => '123456789012345',
                'curp' => 'AABM123456HDFRRS09',
                'rfc' => 'AABM123456RF',
                'address' => 'Av. Reforma 123, Ciudad de México',
                'status' => 'Activo',
                'person_id' => 2, // ID del primer empleado
                'base_salary' => 15000.00,
            ],
            [
                'nss' => '123456789012346',
                'curp' => 'AABM123456HDFRRS10',
                'rfc' => 'AABM123456RF',
                'address' => 'Calle Falsa 456, Guadalajara',
                'status' => 'Activo',
                'person_id' => 3, // ID del segundo empleado
                'base_salary' => 15500.00,
            ],
            [
                'nss' => '123456789012347',
                'curp' => 'AABM123456HDFRRS11',
                'rfc' => 'AABM123456RF',
                'address' => 'Calle 5 de Febrero 789, Monterrey',
                'status' => 'Activo',
                'person_id' => 4, // ID del tercer empleado
                'base_salary' => 16000.00,
            ],
            [
                'nss' => '123456789012348',
                'curp' => 'AABM123456HDFRRS12',
                'rfc' => 'AABM123456RF',
                'address' => 'Avenida Insurgentes 101, Ciudad de México',
                'status' => 'Activo',
                'person_id' => 5, // ID del cuarto empleado
                'base_salary' => 15000.00,
            ],
            [
                'nss' => '123456789012349',
                'curp' => 'AABM123456HDFRRS13',
                'rfc' => 'AABM123456RF',
                'address' => 'Calle Juárez 505, Querétaro',
                'status' => 'Activo',
                'person_id' => 6, // ID del quinto empleado
                'base_salary' => 15800.00,
            ],
            [
                'nss' => '123456789012350',
                'curp' => 'AABM123456HDFRRS14',
                'rfc' => 'AABM123456RF',
                'address' => 'Calle del Sol 321, Puebla',
                'status' => 'Activo',
                'person_id' => 7, // ID del sexto empleado
                'base_salary' => 15000.00,
            ],
            // Recepcionistas
            [
                'nss' => '123456789012351',
                'curp' => 'AABM123456HDFRRS15',
                'rfc' => 'AABM123456RF',
                'address' => 'Av. Las Américas 123, Ciudad de México',
                'status' => 'Activo',
                'person_id' => 8, // ID del primer recepcionista
                'base_salary' => 13000.00,
            ],
            [
                'nss' => '123456789012352',
                'curp' => 'AABM123456HDFRRS16',
                'rfc' => 'AABM123456RF',
                'address' => 'Calle de la Luna 456, Guadalajara',
                'status' => 'Activo',
                'person_id' => 9, // ID del segundo recepcionista
                'base_salary' => 13500.00,
            ]
        ];

        // Insertar los datos de los empleados en la base de datos
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
