<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'appointment_day' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'owner_id' => 'nullable|exists:people_data,id',
            'payment_type' => 'nullable|in:efectivo,transferencia',
            'status' => 'nullable|in:pendiente,cancelada,confirmada',
        ]);

        $appointment = Appointment::create([
            'sign_up_date' => now(),
            'appointment_day' => $validatedData['appointment_day'],
            'appointment_time' => $validatedData['appointment_time'],
            'owner_id' => $validatedData['owner_id'] ?? null,
            'payment_type' => $validatedData['payment_type'] ?? 'efectivo',
            'status' => $validatedData['status'] ?? 'pendiente',
        ]);

        return response()->json(['success' => true, 'appointment' => $appointment]);
    }
}
