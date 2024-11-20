<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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

    public function empleados(){
        $empleados = EmployeeData::with('peopleData')->paginate(5);
        return view('empleados', compact('empleados'));
}
    public function servicios(){
        $servicios = Service::with('typeService')->paginate(5);
        return view('servicios_admin', compact('servicios'));
    }

    public function usuarios(){
        $usuarios = DB::table('users')
        ->join('people_data', 'users.id', '=', 'people_data.user_id') 
        ->select(
            'users.id',
            'users.is_active',
            'users.name',
            'users.email',
            'people_data.first_name',
            'people_data.last_name',
            'people_data.age',
            'people_data.gender',
            'people_data.phone'
        )
        ->paginate(5);

        return view('clientes_admin', compact('usuarios'));
    }

    public function Actualizardatos(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        $person = $user->peopleData; // Asumiendo que tienes una relación definida en el modelo User
        $person->first_name = $request->input('first_name');
        $person->last_name = $request->input('last_name');
        $person->age = $request->input('age');
        $person->gender = $request->input('gender');
        $person->phone = $request->input('phone');
        $person->save();
    
        return redirect()->route('dashboard')->with('success', 'Persona actualizada con éxito');
    }

    public function FomrmEditarUsuario($id)
    {
        $usuario = User::with('peopleData')->findOrFail($id);
        return view('Editar_cliente', compact('usuario'));
    }

    public function toggleStatus($id)
{
    $usuario = User::findOrFail($id);
    $usuario->is_active = !$usuario->is_active; // Cambiar el estado
    $usuario->save();

    return redirect()->back()->with('status', 'Estado actualizado correctamente');
}
}