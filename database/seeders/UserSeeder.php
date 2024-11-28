<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear usuarios con datos reales
        $users = [
            // Admin
            [
                'name' => 'Daniel Garcia',
                'email' => 'daniel@gmail.com',
                'password' => Hash::make('1234'), // Contraseña segura
                'rol' => 'admin',
            ],
            // Empleados
            [
                'name' => 'María López',
                'email' => 'maria.lopez@example.com',
                'password' => Hash::make('empleado123'),
                'rol' => 'empleado',
            ],
            [
                'name' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'password' => Hash::make('empleado123'),
                'rol' => 'empleado',
            ],
            [
                'name' => 'Sofía Martínez',
                'email' => 'sofia.martinez@example.com',
                'password' => Hash::make('empleado123'),
                'rol' => 'empleado',
            ],
            [
                'name' => 'Luis Ramírez',
                'email' => 'luis.ramirez@example.com',
                'password' => Hash::make('empleado123'),
                'rol' => 'empleado',
            ],
            [
                'name' => 'Ana Gómez',
                'email' => 'ana.gomez@example.com',
                'password' => Hash::make('empleado123'),
                'rol' => 'empleado',
            ],
            [
                'name' => 'Diego Fernández',
                'email' => 'diego.fernandez@example.com',
                'password' => Hash::make('empleado123'),
                'rol' => 'empleado',
            ],
            // Recepcionistas
            [
                'name' => 'Ximena Martinez',
                'email' => 'ximena@gmail.com',
                'password' => Hash::make('1234'),
                'rol' => 'recepcionista',
            ],
            [
                'name' => 'Jorge Herrera',
                'email' => 'jorge.herrera@example.com',
                'password' => Hash::make('recepcionista123'),
                'rol' => 'recepcionista',
            ],
            // Clientes
            [
                'name' => 'Gabriela Cruz',
                'email' => 'gabriela.cruz@example.com',
                'password' => Hash::make('cliente123'),
                'rol' => 'cliente',
            ],
            [
                'name' => 'Roberto Castillo',
                'email' => 'roberto.castillo@example.com',
                'password' => Hash::make('cliente123'),
                'rol' => 'cliente',
            ],
            [
                'name' => 'Isabel Ortega',
                'email' => 'isabel.ortega@example.com',
                'password' => Hash::make('cliente123'),
                'rol' => 'cliente',
            ],
            [
                'name' => 'Pedro Gutiérrez',
                'email' => 'pedro.gutierrez@example.com',
                'password' => Hash::make('cliente123'),
                'rol' => 'cliente',
            ],
        ];

        // Insertar usuarios y asignar roles
        foreach ($users as $user) {
            // Crear el usuario
            $userId = DB::table('users')->insertGetId([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Obtener el rol correspondiente
            $roleId = DB::table('roles')->where('rol', $user['rol'])->value('id');

            // Asignar el rol al usuario en la tabla pivote
            DB::table('user_rol')->insert([
                'user' => $userId,
                'rol' => $roleId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
