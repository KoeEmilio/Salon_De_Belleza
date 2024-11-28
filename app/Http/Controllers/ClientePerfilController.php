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
        ->paginate(4);

    return view('CitasCliente', compact('citas'));
    }

    public function DatosCLiente()
{
    $cliente = PeopleData::where('user_id', Auth::id())->first();
    

    return view('PerfilCliente', compact('cliente'));
}
    

    
}
