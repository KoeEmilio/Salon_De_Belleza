<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;


    
    class AppointmentController extends Controller
    {
        public function store(Request $request)
        {
            // Valida los datos del formulario
            $request->validate([
                'service' => 'required',
                'date' => 'required|date',
                'time' => 'required',
            ]);
    
            // Guarda la cita en la base de datos
            // Asumiendo que tienes un modelo Appointment
            \App\Models\Appointment::create([
                'service_id' => $request->input('service'),
                'date' => $request->input('date'),
                'time' => $request->input('time'),
            ]);
    
            // Redirige con un mensaje de éxito
            return redirect()->back()->with('success', 'Cita creada exitosamente.');
        }
    }
    
    

