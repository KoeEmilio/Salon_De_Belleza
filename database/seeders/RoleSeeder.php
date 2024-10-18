<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['rol' => 'admin']);
        Role::create(['rol' => 'empleado']);
        Role::create(['rol' => 'recepcionista']); 
        Role::create(['rol' => 'cliente']);
    }
}
