<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role; 
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        
        $adminRole = Role::where('rol', 'admin')->first();

        if ($adminRole) {
            $this->createUser('Emilio', 'emilio@gmail.com', $adminRole); 
            $this->createUser('Daniel', 'daniel@gmail.com', $adminRole); 
        } else {
            echo "El rol 'admin' no existe. Asegúrate de que esté creado en la base de datos.\n";
        }

        
        $employeeRole = Role::where('rol', 'empleado')->first();
        $receptionistRole = Role::where('rol', 'recepcionista')->first();
        $clientRole=Role::where('rol','cliente')->first();

        if ($employeeRole) {
            $this->createUser('Carlos', 'carlos@gmail.com', $employeeRole);
            $this->createUser('Laura', 'laura@gmail.com', $employeeRole);
            $this->createUser('Pedro', 'pedro@gmail.com', $employeeRole);
        } else {
            echo "El rol 'empleado' no existe. Asegúrate de que esté creado en la base de datos.\n";
        }

       
        if ($receptionistRole) {
            $this->createUser('Ana', 'ana@gmail.com', $receptionistRole); 
            $this->createUser('Luis', 'luis@gmail.com', $receptionistRole); 
        } else {
            echo "El rol 'recepcionista' no existe. Asegúrate de que esté creado en la base de datos.\n";
        }

        if ($clientRole) {
            $this->createUser('Mariana', 'mariana@gmail.com', $clientRole);
            $this->createUser('Danna', 'danna@gmail.com', $clientRole);
            $this->createUser('Ricardo', 'ricardo@gmail.com', $clientRole);
        } else {
            echo "El rol 'cliente' no existe. Asegúrate de que esté creado en la base de datos.\n";
        }
    }

    private function createUser($name, $email, $role = null)
    {
        // Crear el usuario, asegurándose de que no se duplique por correo
        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make('1234'), // Contraseña por defecto
                'remember_token' => Str::random(10), // Token de recuerdo
            ]
        );

        // Asignar el rol al usuario si se proporciona
        if ($role) {
            $user->roles()->attach($role->id);
        }
    }
}
