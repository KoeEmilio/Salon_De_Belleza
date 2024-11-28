<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Appointment;
use App\Models\HairType;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Muestra los servicios asociados a una cita específica con filtro y paginación.
     */
    public function index(Request $request, $appointmentId)
    {
        $searchQuery = $request->input('search'); // Obtener el término de búsqueda
        
        // Buscar la cita y cargar los servicios asociados con filtros aplicados
        $appointment = Appointment::with(['services' => function ($queryBuilder) use ($searchQuery) {
            if ($searchQuery) {
                $queryBuilder->where('service_name', 'like', "%{$searchQuery}%")
                             ->orWhere('description', 'like', "%{$searchQuery}%");
            }
        }])->findOrFail($appointmentId);

        // Paginar los servicios después de aplicar los filtros
        $services = $appointment->services()->paginate(5);

        return view('ver_servicios', [
            'services' => $services,
            'appointment' => $appointment, // Para mostrar detalles de la cita o cliente
            'query' => $searchQuery // Mantener el término de búsqueda en la vista
        ]);
    }

    /**
     * Muestra el formulario para agregar un servicio a una cita específica.
     */
    public function create($appointmentId)
    {
        dd($appointmentId);
        $appointment = Appointment::findOrFail($appointmentId);
        $services = Service::all();
        $hairTypes = HairType::all();

        return view('agregar_cita', [
            'appointment' => $appointment,
            'services' => $services,
            'hairTypes' => $hairTypes,
            'clientId' => $appointment->client_id,
        ]);
    }

    /**
     * Almacena la asociación de un servicio con una cita.
     */
    public function store(Request $request, $appointmentId)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id', // Validar que el servicio existe
        ]);

        // Buscar la cita
        $appointment = Appointment::findOrFail($appointmentId);

        // Asociar el servicio a la cita
        $appointment->services()->attach($request->service_id);

        // Redirigir con un mensaje de éxito
        return redirect()->route('servi.create', $appointmentId)
                         ->with('success', 'Servicio agregado correctamente.');
    }

    /**
     * Elimina un servicio asociado a una cita específica.
     */
    public function destroy($appointmentId, $serviceId)
    {
        $appointment = Appointment::findOrFail($appointmentId);

        // Verificar si el servicio está asociado a la cita antes de eliminarlo
        if ($appointment->services()->where('id', $serviceId)->exists()) {
            $appointment->services()->detach($serviceId);

            return redirect()->route('servi.index', $appointmentId)
                             ->with('success', 'Servicio eliminado de la cita exitosamente.');
        }

        return redirect()->route('servi.index', $appointmentId)
                         ->with('info', 'El servicio no está asociado a esta cita.');
    }
}
