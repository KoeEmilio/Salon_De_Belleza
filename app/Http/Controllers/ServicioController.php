<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Appointment;
use App\Models\HairType;
use Illuminate\Http\Request;
use App\Models\ServiceDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
    public function graficaMes(){
        return view('Graficas_admin');
    }
    public function serviciosmes()
    {
        $serviciosAgendados = ServiceDetail::selectRaw('service_id, COUNT(*) as total')
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy('service_id')
            ->with('service:id,service_name') 
            ->get();
            $data = DB::table('orders')
            ->join('detail_orders', 'orders.id', '=', 'detail_orders.order_id')
            ->select(
                DB::raw("DATE_FORMAT(orders.created_at, '%Y-%m') AS month"),
                DB::raw("SUM(detail_orders.quantity * detail_orders.unit_price) AS total_earnings")
            )
            ->groupBy(DB::raw("DATE_FORMAT(orders.created_at, '%Y-%m')"))
            ->orderBy('month', 'ASC')
            ->get();
    
        $months = $data->pluck('month')->toArray();
        $earnings = $data->pluck('total_earnings')->toArray();

        return view('graficas_admin', compact('serviciosAgendados', 'months', 'earnings'));
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
