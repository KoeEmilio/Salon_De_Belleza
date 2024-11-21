<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\TypeService;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\AppointmentService;
class ServicioController extends Controller
{
    // Mostrar los servicios asociados a una cita específica
    public function index(Request $request, $appointmentId)
{
    $query = $request->input('search'); // Obtener el término de búsqueda de la solicitud
    
    // Obtener la cita con los servicios asociados, aplicando búsqueda y paginación si es necesario
    $appointment = Appointment::with(['services' => function($queryBuilder) use ($query) {
        if ($query) {
            // Filtrar por nombre del servicio o descripción si se proporciona una consulta
            $queryBuilder->where('service', 'like', "%{$query}%")
                         ->orWhere('description', 'like', "%{$query}%");
        }
    }])->findOrFail($appointmentId);
    
    // Paginar los servicios asociados después de filtrar
    $services = $appointment->services()->paginate(5);

    return view('ver_servicios', [
        'services' => $services,
        'appointment' => $appointment, // También pasamos la cita si necesitas el nombre del cliente
        'query' => $query // Pasamos la variable de búsqueda a la vista
    ]);
}

    // Formulario para agregar un nuevo servicio
    public function create($appointmentId)
    {
        $serviceTypes = TypeService::all(); // Obtener todos los tipos de servicio

        return view('agregar_servicio', compact('serviceTypes', 'appointmentId'));
    }

    // Guardar un nuevo servicio
    public function store(Request $request, $appointmentId)
    {
        // Validación
        $request->validate([
            'service' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'type_id' => 'required|exists:type_service,id',
        ]);

        // Crear servicio
        $service = Service::create($request->all());

        // Asociar el servicio a la cita mediante AppointmentService
        AppointmentService::create([
            'appointment_id' => $appointmentId,
            'service_id' => $service->id,
        ]);

        // Redirigir a la vista que muestra los servicios de la cita
        return redirect()->route('ver_servicios', $appointmentId)->with('success', 'Servicio agregado exitosamente.');
    }

    // Formulario para editar un servicio existente
    public function edit($id, $appointmentId)
{
    $service = Service::findOrFail($id);
    $serviceTypes = TypeService::all();

    return view('editar_servicio', compact('service', 'serviceTypes', 'appointmentId'));
}

public function update(Request $request, $id, $appointmentId)
{
    $service = Service::findOrFail($id);
    $service->update($request->all()); // Actualiza el servicio con los datos del formulario

    // Redirige a la vista de servicios pasando el appointmentId
    return redirect()->route('ver_servicios', ['appointmentId' => $appointmentId])->with('success', 'Servicio actualizado correctamente.');
}

    // Eliminar un servicio
    public function destroy($id)
    {
        $appointmentService = AppointmentService::where('service_id', $id)->firstOrFail(); // Obtiene la relación antes de eliminar
        $appointmentId = $appointmentService->appointment_id;

        $appointmentService->delete(); // Eliminar la relación de AppointmentService

        // Redirigir a la vista de servicios de la cita
        return redirect()->route('ver_servicios', $appointmentId)->with('success', 'Servicio eliminado exitosamente.');
    }
}
