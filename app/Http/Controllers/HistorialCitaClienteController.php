<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\PeopleData; // Asegúrate de que el modelo PeopleData está correctamente importado

class HistorialCitaClienteController extends Controller
{
    public function index($clienteId)
    {
        // Obtener las citas del cliente utilizando 'owner_id' en lugar de 'client_id'
        $appointments = Appointment::where('owner_id', $clienteId)
                                   ->orderBy('appointment_day', 'desc')
                                   ->get();
    
        // Obtener el cliente, si es necesario
        $cliente = PeopleData::find($clienteId); // Ajusta esto según cómo estés manejando los datos del cliente
    
        return view('historialcita_cliente', compact('appointments', 'cliente'));
    }
}
