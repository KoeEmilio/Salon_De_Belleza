<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Appointment; // Modelo Appointment
use App\Models\PeopleData;  // Modelo PeopleData
use App\Models\Service;     // Modelo Service

class RecepcionistaController extends Controller
{
    public function index()
    {
        $recepcionista = Auth::user();
        return view('home_recepcionista', compact('recepcionista'));
    }

    public function citas(Request $request)
{
    $search = $request->input('search');

    // Buscar citas según el término de búsqueda
    $appointments = Appointment::with('client', 'services')
        ->when($search, function ($query) use ($search) {
            return $query->whereHas('client', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('last_name', 'LIKE', "%{$search}%");
            });
        })
        ->paginate(5); // Cambia el número a la cantidad de elementos por página que desees

    return view('citas_recepcionista', compact('appointments', 'search'));
}


    public function create()
    {
        $servicios = Service::all();
        return view('agregar_cita', compact('servicios'));
    }

    public function store(Request $request)
{
    $request->validate([
        'client_name' => 'required|string',
        'last_name' => 'required|string',
        'age' => 'required|integer|min:0',
        'phone' => 'required|string|max:15',
        'appointment_day' => 'required|date',
        'appointment_time' => 'required|date_format:H:i',
        'status' => 'required|in:pendiente,cancelada,confirmada',
        'payment_type' => 'required|in:efectivo,transferencia',

    ]);

    // Verificar si el cliente ya existe
    $client = PeopleData::where('name', $request->client_name)
                        ->where('last_name', $request->last_name)
                        ->first();

    // Si el cliente no existe, crearlo
    if (!$client) {
        $client = PeopleData::create([
            'name' => $request->client_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'phone' => $request->phone,
        ]);
    }
    
    // Crear la cita
    $appointment = Appointment::create([
        'client_id' => $client->id,
        'sign_up_date' => now(),
        'appointment_day' => $request->appointment_day,
        'appointment_time' => $request->appointment_time,
        'status' => $request->status,
        'payment_type' => $request->payment_type,
    ]);

    // Asociar los servicios seleccionados a la cita
    $appointment->services()->attach($request->services);

    return redirect()->route('recepcionista.citas')->with('success', 'Cita guardada con éxito');
}

    public function edit($id)
    {
        $appointment = Appointment::with('client', 'services')->findOrFail($id);
        $servicios = Service::all();
        return view('editar_cita', compact('appointment', 'servicios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_name' => 'required|string',
            'last_name' => 'required|string',
            'age' => 'required|integer|min:0',
            'phone' => 'required|string|max:15',
            'appointment_day' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'status' => 'required|in:pendiente,cancelada,confirmada',
            'payment_type' => 'required|in:efectivo,transferencia',

        ]);

        // Encontrar la cita a actualizar
        $appointment = Appointment::findOrFail($id);

        // Actualizar los datos del cliente
        $client = PeopleData::find($appointment->client_id);
        if ($client) {
            $client->update([
                'name' => $request->client_name,
                'last_name' => $request->last_name,
                'age' => $request->age,
                'phone' => $request->phone,
            ]);
        }

        // Actualizar los datos de la cita
        $appointment->update([
            'appointment_day' => $request->appointment_day,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
            'payment_type' => $request->payment_type,
        ]);

        // Sincronizar los servicios seleccionados
        $appointment->services()->sync($request->services);

        return redirect()->route('recepcionista.citas')->with('success', 'Cita actualizada con éxito');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->route('recepcionista.citas')->with('success', 'Cita cancelada exitosamente.');
    }
    
}