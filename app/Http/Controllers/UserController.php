<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Asigna un rol a un usuario
    public function assignRole(Request $request, $userId)
    {
        // Validar la solicitud
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($userId);
        $role = Role::findOrFail($request->role_id);

        $user->roles()->attach($role->id);

        return response()->json(['message' => 'Rol asignado correctamente.']);
    }

    // Obtiene los roles de un usuario
    public function getUserRoles($userId)
    {
        $user = User::with('roles')->findOrFail($userId);
        return response()->json($user->roles);
    }
}
