<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $user = Auth::user();

        return view('inicio_admin', compact('user')); 
    }

    public function empleados(){
        $empleados = Employee::with('person')->get();
        return view('empleados', compact('empleados'));
}
    public function servicios(){
        $servicios = Service::with('typeService')->get();
        return view('servicios_admin', compact('servicios'));
    }

    public function usuarios(){

        $usuarios = DB::select('
            SELECT users.id, users.name, users.email
            FROM users
            JOIN user_rol ON users.id = user_rol.user
        ');

        return view('clientes_admin', compact('usuarios'));
    }

}