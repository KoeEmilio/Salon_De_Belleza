<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
class CitasController extends Controller
{
    public function index()
    {
        return view('citas');
    }

    public function showCita2()
{
    return view('cita2');
}

public function obtenerHorasDisponibles(Request $request)
{
    $fecha = $request->input('fecha');

    
    $horasTotales = [
        '09:00', '10:00', '11:00', '12:00',
        '01:00', '02:00', '03:00', '04:00',
        '05:00', '06:00', '07:00', '08:00', '09:00',
    ];

    $horasOcupadas = Appointment::where('appointment_day', $fecha)->pluck('appointment_time')->toArray();

    return response()->json([
        'horas' => $horasTotales,
        'ocupadas' => $horasOcupadas,
    ]);
}


}
