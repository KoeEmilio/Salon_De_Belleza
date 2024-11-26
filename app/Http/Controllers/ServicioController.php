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

    
}
