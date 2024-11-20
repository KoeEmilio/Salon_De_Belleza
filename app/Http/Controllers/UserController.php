<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function assignRole(Request $request, $userId)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($userId);
        $role = Role::findOrFail($request->role_id);

        $user->roles()->attach($role->id);

        return response()->json(['message' => 'Rol asignado correctamente.']);
    }

    public function getUserRoles($userId)
    {
        $user = User::with('roles')->findOrFail($userId);
        return response()->json($user->roles);
    }

    public function registerPerson(Request $request)
{

    DB::statement('CALL RegisterPerson(?, ?, ?, ?, ?, ?, ?, ?)', [
        $request->input('first_name'),
        $request->input('last_name'),
        $request->input('age'),
        $request->input('gender'),
        $request->input('phone'),
        $request->input('name'),
        $request->input('email'),
        Hash::make($request->input('password')) 
    ]);

    return redirect()->route('login')->with('success', 'Persona actualizada con éxito');
}

public function update(Request $request)
{
    $user = User::find($request->id);
    
    // Validar los datos
    // $request->validate([
    //     'name' => 'required|string|max:255',
    //     'email' => 'required|email|max:255|unique:users,email,' . $user->id,
    //     'password' => 'nullable|min:6',
    // ]);
    
    // Actualizar los datos
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    return redirect()->route('dashboard')->with('success', 'Usuario actualizado con éxito');
}
}
