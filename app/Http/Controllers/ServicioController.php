<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Appointment;
use App\Models\HairType;
use Illuminate\Http\Request;
use App\Models\ServiceDetail;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{

    public function index(Request $request, $appointmentId)
    {
        $searchQuery = $request->input('search'); 
        

        $appointment = Appointment::with(['services' => function ($queryBuilder) use ($searchQuery) {
            if ($searchQuery) {
                $queryBuilder->where('service_name', 'like', "%{$searchQuery}%")
                             ->orWhere('description', 'like', "%{$searchQuery}%");
            }
        }])->findOrFail($appointmentId);

        $services = $appointment->services()->paginate(5);

        return view('ver_servicios', [
            'services' => $services,
            'appointment' => $appointment, 
            'query' => $searchQuery 
        ]);
    }
    public function graficaMes(){
        return view('Graficas_admin');
    }
    public function serviciosmes()
    {
        $serviciosAgendados = ServiceDetail::selectRaw('service_id, COUNT(*) as total')
            ->whereMonth('created_at', 12)
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

        return view('Graficas_admin', compact('serviciosAgendados', 'months', 'earnings'));
    }


    public function create($appointmentId)
    {
       
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

    public function store(Request $request, $appointmentId)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id', 
        ]);

        $appointment = Appointment::findOrFail($appointmentId);

        $appointment->services()->attach($request->service_id);

        return redirect()->route('servi.create', $appointmentId)
                         ->with('success', 'Servicio agregado correctamente.');
    }

    public function destroy($appointmentId, $serviceId)
    {
        $appointment = Appointment::findOrFail($appointmentId);

      
        if ($appointment->services()->where('id', $serviceId)->exists()) {
            $appointment->services()->detach($serviceId);

            return redirect()->route('servi.index', $appointmentId)
                             ->with('success', 'Servicio eliminado de la cita exitosamente.');
        }

        return redirect()->route('servi.index', $appointmentId)
                         ->with('info', 'El servicio no está asociado a esta cita.');
    }
}
