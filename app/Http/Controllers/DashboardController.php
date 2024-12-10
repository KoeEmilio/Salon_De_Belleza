<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeData;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\UserRol;

class DashboardController extends Controller
{
    public function index(){

        $user = Auth::user();

        return view('inicio_admin', compact('user')); 
    }
    public function empleados() {
        $empleados = User::whereHas('roles', function ($query) {
            $query->whereIn('roles.rol', ['empleado', 'recepcionista']);  
        })->paginate(5);  
    
        return view('empleados', compact('empleados'));
    }
    
    
    
    public function servicios(){
        $servicios = Service::with('typeService')->paginate(5);
        return view('servicios_admin', compact('servicios'));
    }

    public function usuarios(){
        $usuarios = User::with('roles')  
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
        ->paginate(4);

    $roles = Role::all(); 


        return view('clientes_admin', compact('usuarios', 'roles'));
    }




    public function Actualizardatos(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->save();

        $person = $user->peopleData;
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
        return view('Edit_cliente', compact('usuario',));
    }

    public function toggleStatus($id)
{
    $usuario = User::findOrFail($id);
    $usuario->is_active = !$usuario->is_active; 
    $usuario->save();

    return redirect()->back()->with('status', 'Estado actualizado correctamente');
}

public function actualizarRol(Request $request, $id)
{
    $request->validate([
        'rol' => 'required|exists:roles,id', 
    ]);

    $user = User::findOrFail($id);

    $user->roles()->sync([$request->input('rol')]);  

    return redirect()->route('clientes_admin')->with('success', 'Rol actualizado correctamente');
}

    public function buscar(Request $request)
    {
        $query = $request->input('search');

        $usuarios = User::with('roles') 
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
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder
                    ->where('users.name', 'like', "%{$query}%")
                    ->orWhere('users.email', 'like', "%{$query}%")
                    ->orWhere('people_data.first_name', 'like', "%{$query}%")
                    ->orWhere('people_data.last_name', 'like', "%{$query}%")
                    ->orWhere('people_data.gender', 'like', "%{$query}%")
                    ->orWhere('people_data.age', 'like', "%{$query}%")
                    ->orWhere('people_data.phone', 'like', "%{$query}%");
            })
            ->paginate(4);
    
        $roles = Role::all(); 
    
        return view('clientes_admin', compact('usuarios', 'query', 'roles'));
    }

    public function FomrmEditarServicio($id)
    {
        $servicio = Service::with('typeService')->findOrFail($id);
        return view('Edit_servicios', compact('servicio'));
    }

    public function Actualizarservicios(Request $request, $id)
    {
        $servicio = Service::findOrFail($id);
        $servicio->service_name = $request->input('service_name');
        $servicio->price = $request->input('price');
        $servicio->description = $request->input('description');
        $servicio->duration = $request->input('duration');
        $servicio->save();

        $tipo_servicio = $servicio->typeService;
        $tipo_servicio->type = $request->input('type');
        $tipo_servicio->save();

        return redirect()->route('servicios_admin')->with('success', 'Persona actualizada con éxito');
    }

}