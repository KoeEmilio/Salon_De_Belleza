<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\PeopleData; 

class HistorialCitaClienteController extends Controller
{
    public function index($clienteId)
    {
        $appointments = Appointment::where('owner_id', $clienteId)
                                   ->orderBy('appointment_day', 'desc')
                                   ->get();
    
        $cliente = PeopleData::find($clienteId); 
        return view('historialcita_cliente', compact('appointments', 'cliente'));
    }
}
