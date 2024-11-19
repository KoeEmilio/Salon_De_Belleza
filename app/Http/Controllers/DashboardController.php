<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\EmployeeData;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $user = Auth::user();

        return view('inicio_admin', compact('user')); 
    }

    public function empleados() {
        // Obtener todos los usuarios y sus datos asociados
        $empleados = User::with('roles') // Asegúrate de cargar los roles asociados
            ->paginate(5); // Paginación de 5 usuarios por página
    
        return view('empleados', compact('empleados'));
    }
    
    
    
    public function servicios(){
        $servicios = Service::with('typeService')->paginate(5);
        return view('servicios_admin', compact('servicios'));
    }

    public function usuarios(){

        $usuarios = DB::table('users')
        ->select('users.id','users.name', 'users.email')
        ->paginate(5); 

    return view('clientes_admin', compact('usuarios'));
    }

}