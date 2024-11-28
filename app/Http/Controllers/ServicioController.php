<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\TypeService;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\AppointmentService;
use App\Models\ServiceDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function destroy($id)
{
    $servicio = Service::findOrFail($id);
    $servicio->delete();

    return redirect()->route('servicios_admin')->with('success', 'Servicio eliminado correctamente');
}

}
