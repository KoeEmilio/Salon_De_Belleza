<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'appointment_day' => 'required|date', // Asegúrate de que sea una fecha válida
            'appointment_time' => 'required|date_format:H:i', // Asegúrate de que sea una hora válida
        ]);
    
        // Si pasa la validación, guarda la cita
        $appointment = Appointment::create([
            'appointment_day' => $request->appointment_day,
            'appointment_time' => $request->appointment_time,
            'owner_id' => $request->owner_id, // Opcional
            'payment_type' => $request->payment_type, // Opcional
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Cita guardada correctamente',
            'appointment' => $appointment,
        ]);
    }
    
}
