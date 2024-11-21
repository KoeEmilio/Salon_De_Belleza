<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeopleData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientePerfilController extends Controller
{
    /**
     * Muestra el perfil del cliente.
     */
    public function perfil()
    {
        $cliente = auth()->user();
        return view('cliente_perfil', compact('cliente'));
    }

    /**
     * Muestra el formulario para editar el perfil del cliente.
     */
    public function editarPerfil()
    {
        $cliente = auth()->user();
        return view('cliente_perfil_editar', compact('cliente'));
    }

    public function citas()
{
    $userId = Auth::id();

    $citas = DB::table('appointments')
        ->join('people_data', 'appointments.owner_id', '=', 'people_data.id') 
        ->where('people_data.user_id', $userId) 
        ->select(
            'appointments.sign_up_date',
            'appointments.appointment_day',
            'appointments.appointment_time',
            'people_data.first_name',
            'appointments.status',
            'appointments.payment_type'
        )
        ->paginate(5);

    return view('CitasCliente', compact('citas'));
    }

    public function DatosCLiente()
    {
        $userId = Auth::id();

        $cliente = DB::table('people_data')
            ->where('user_id', $userId)
            ->select(
                'people_data.first_name',
                'people_data.last_name',
                'people_data.age',
                'people_data.gender',
                'people_data.phone'
            )
            ->first();

        return view('PerfilCliente', compact('cliente'));
    }

    public function NombreUsuario()
    {
        $userId = Auth::id();

        $usuario = DB::table('people_data')
            ->where('user_id', $userId)
            ->select(
                'people_data.first_name',
            )
            ->first();

        return view('layouts.PerfilUsuario', compact('usuario'));
    }
}
