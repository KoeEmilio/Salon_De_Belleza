<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeopleData; // Modelo de clientes
use App\Models\Appointment; // Modelo de citas
use App\Models\Service; // Modelo de servicios
use App\Models\ServiceDetail; // Modelo de detalles de servicios

class CitasRecepcionistaController extends Controller
{
    /**
     * Mostrar la vista principal con citas y datos necesarios.
     */
    public function index()
    {
        $clientes = PeopleData::all();
        $servicios = Service::all(); 
        $citas = Appointment::with(['owner', 'services'])->get();

        return view('citas_recepcionista', compact('clientes', 'servicios', 'citas'));
    }

   
public function create()
{
    $clientes = PeopleData::all();  // Obtener todos los clientes
    return view('agregar_cita', compact('clientes'));
}

public function store(Request $request)
{
    // Validar los datos
    $request->validate([
        'name' => 'required|string|max:15',
        'last_name' => 'required|string|max:20',
        'age' => 'required|integer',
        'gender' => 'required|in:H,M',
        'phone' => 'required|string|size:10',
        'appointment_day' => 'required|date',
        'appointment_time' => 'required|date_format:H:i',
        'status' => 'required|in:pendiente,confirmada,cancelada',
        'payment_type' => 'required|in:efectivo,transferencia',
    ]);

    // Crear un nuevo cliente en la tabla people_data
    $cliente = PeopleData::create([
        'first_name' => $request->name,
        'last_name' => $request->last_name,
        'age' => $request->age,
        'gender' => $request->gender,
        'phone' => $request->phone,
        'user_id' => auth()->id(), // Suponiendo que tienes un campo user_id
    ]);

    // Crear la cita
    $cita = Appointment::create([
        'owner_id' => $cliente->id, // Asociar la cita con el cliente recién creado
        'appointment_day' => $request->appointment_day,
        'appointment_time' => $request->appointment_time,
        'status' => $request->status,
        'payment_type' => $request->payment_type,
        'sign_up_date' => now(), // Fecha de registro de la cita
    ]);

    // Redirigir con éxito
    return redirect()->route('appointment.index')->with('success', 'Cita creada con éxito');
}

public function showServices($id)
{
    // Buscar la cita por ID
    $cita = Appointment::with('services')->findOrFail($id);

    // Retornar la vista con la cita y sus servicios
    return view('ver_servicios', compact('cita'));
}

public function edit($id)
{
    $cita = Appointment::findOrFail($id);
    $clientes = PeopleData::all();  // Obtener todos los clientes
    return view('editar_cita', compact('cita', 'clientes'));
}

public function update(Request $request, $id)
{
    // Validar los datos
    $request->validate([
        'name' => 'required|string|max:15',
        'last_name' => 'required|string|max:20',
        'age' => 'required|integer',
        'gender' => 'required|in:H,M',
        'phone' => 'required|string|size:10',
        'appointment_day' => 'required|date',
        'appointment_time' => 'required|date_format:H:i',
        'status' => 'required|in:pendiente,confirmada,cancelada',
        'payment_type' => 'required|in:efectivo,transferencia',
    ]);

    // Buscar la cita
    $cita = Appointment::findOrFail($id);

    // Actualizar los datos del cliente
    $cliente = $cita->owner; // Obtener el propietario de la cita
    $cliente->update([
        'first_name' => $request->name,
        'last_name' => $request->last_name,
        'age' => $request->age,
        'gender' => $request->gender,
        'phone' => $request->phone,
    ]);

    // Actualizar la cita
    $cita->update([
        'appointment_day' => $request->appointment_day,
        'appointment_time' => $request->appointment_time,
        'status' => $request->status,
        'payment_type' => $request->payment_type,
    ]);

    // Redirigir con éxito
    return redirect()->route('appointment.index')->with('success', 'Cita actualizada con éxito');
}

}
