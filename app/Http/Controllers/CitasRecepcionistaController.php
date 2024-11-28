<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\PeopleData;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CitasRecepcionistaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
    
        $citas = Appointment::with('owner')
            ->when($search, function($query, $search) {
                return $query->where('appointment_day', 'like', "%$search%")
                             ->orWhereHas('owner', function ($query) use ($search) {
                                 $query->where('first_name', 'like', "%$search%")
                                       ->orWhere('last_name', 'like', "%$search%");
                             });
            })
            ->paginate(5);
    
        return view('citas_recepcionista', compact('citas'));
    }

    public function create()
    {
        return view('agregar_cita');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'last_name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'phone' => 'required|regex:/^\d{10}$/',
            'age' => 'required|integer|min:18|max:120',
            'appointment_day' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|date_format:H:i',
            'status' => 'required|in:Pendiente,Confirmada,Cancelada',
            'payment_type' => 'required|in:Efectivo,Transferencia',
        ]);
    
        $client = PeopleData::create([
            'first_name' => $request->client_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'age' => $request->age,
            'user_id' => $request->user_id ?? auth()->id(),
        ]);
    
        $appointment = Appointment::create([
            'owner_id' => $client->id,
            'appointment_day' => $request->appointment_day,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
            'payment_type' => $request->payment_type,
            'sign_up_date' => now(),
        ]);
    
        return redirect()->route('citas.index')->with('success', 'Cita agregada exitosamente.');
    }

    public function edit($id)
    {
        $cita = Appointment::findOrFail($id);
        
        return view('editar_cita', compact('cita'));
    }

    public function update(Request $request, $id)
{
    // Validación de los datos de la cita
    $request->validate([
        'appointment_day' => 'required|date|after_or_equal:today', // Asegura que la cita sea para hoy o después
        'appointment_time' => 'required|date_format:H:i', // Asegura que la hora de la cita sea después de la hora actual
        'client_name' => 'required|regex:/^[a-zA-Z\s]+$/',
        'last_name' => 'required|regex:/^[a-zA-Z\s]+$/',
        'status' => 'required|string|in:pendiente,confirmada,cancelada', // Validar que el estado esté dentro de las opciones
        'payment_type' => 'required|string|in:efectivo,transferencia', // Validar que el tipo de pago esté dentro de las opciones
    ]);

    // Buscar la cita existente por su ID
    $cita = Appointment::findOrFail($id);

    // Actualizar los datos del cliente (owner)
    $client = $cita->owner; // Accede al propietario de la cita (persona asociada)
    $client->update([
        'first_name' => $request->input('client_name'),
        'last_name' => $request->input('last_name'),
    ]);

    // Actualizar los datos de la cita
    $cita->update([
        'appointment_day' => $request->input('appointment_day'),
        'appointment_time' => $request->input('appointment_time'),
        'status' => $request->input('status'),
        'payment_type' => $request->input('payment_type'),
    ]);

    // Redirigir con mensaje de éxito
    return redirect()->route('citas.index')->with('success', 'Cita actualizada con éxito');
}

}
