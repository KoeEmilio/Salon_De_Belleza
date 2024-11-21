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
        // Validar los datos del formulario
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer',
            'phone' => 'required|string|max:15',
            'appointment_day' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'status' => 'required|string',
            'payment_type' => 'required|string',
            'owner_id' => 'required|integer',  // Validar que se reciba un owner_id
        ]);

        // Crear la cita en la base de datos
        Appointment::create([
            'client_name' => $request->client_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'phone' => $request->phone,
            'appointment_day' => $request->appointment_day,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
            'payment_type' => $request->payment_type,
            'owner_id' => $request->owner_id,  // Guardar el owner_id recibido
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirigir a la lista de citas con un mensaje de éxito
        return redirect()->route('recepcionista.citas')->with('success', 'Cita agregada exitosamente');
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