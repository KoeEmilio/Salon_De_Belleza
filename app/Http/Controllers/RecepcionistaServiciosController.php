<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\ServiceDetail;
use App\Models\HairType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderDetailMail;
use app\Models\Order;
class RecepcionistaServiciosController extends Controller
{
    // Mostrar los servicios y detalles de una cita
    public function index($appointmentId)
    {
        $cita = Appointment::with(['services', 'serviceDetails'])->findOrFail($appointmentId);
        $allServices = Service::all();

        return view('ver_servicios', compact('cita', 'allServices'));
    }

    // Mostrar formulario para crear un nuevo servicio para una cita específica
    public function create($appointmentId)
    {
        $cita = Appointment::findOrFail($appointmentId);
        $services = Service::all();
        $hairTypes = HairType::all();

        return view('agregar_servicio', compact('cita', 'services', 'hairTypes'));
    }

    // Almacenar un nuevo servicio en la base de datos
    public function store(Request $request, $appointmentId)
    {
        $validatedData = $request->validate([
            'service_id' => 'required|exists:services,id',
            'hair_type_id' => 'required|exists:hair_type,id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
        ]);

        $hairType = HairType::findOrFail($validatedData['hair_type_id']);
        $totalPrice = ($validatedData['unit_price'] + $hairType->price) * $validatedData['quantity'];

        ServiceDetail::create([
            'service_id' => $validatedData['service_id'],
            'hair_type_id' => $validatedData['hair_type_id'],
            'quantity' => $validatedData['quantity'],
            'unit_price' => $validatedData['unit_price'],
            'total_price' => $totalPrice,
            'appointment_id' => $appointmentId,
        ]);

        return redirect()->route('service.index', $appointmentId)
                         ->with('success', 'Servicio agregado correctamente');
    }
    public function showOrderDetails($orderId)
    {
        $order = \App\Models\Order::with('employee.person', 'serviceDetails.service')->findOrFail($orderId);
         
        return view('detalle_orden', compact('order'));
    }
    // Mostrar formulario para editar un servicio
    public function edit($serviceDetailId)
{
    $serviceDetail = ServiceDetail::with('service', 'hairType', 'appointment.owner')->findOrFail($serviceDetailId);
    $cita = $serviceDetail->appointment; 
    $hairTypes = HairType::all();
    $services = Service::all();

    // Obtener duración del servicio y precio adicional del tipo de cabello
    $serviceDetail->duration = $serviceDetail->service->duration ?? 0;
    $serviceDetail->hair_extra_price = $serviceDetail->hairType->price ?? 0;

    return view('editar_servicio', compact('serviceDetail', 'cita', 'services', 'hairTypes'));
}

    // Actualizar un servicio existente
    public function update(Request $request, $serviceDetailId)
    {
        $serviceDetail = ServiceDetail::findOrFail($serviceDetailId);

        $validatedData = $request->validate([
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'hair_type_id' => 'required|exists:hair_type,id',
        ]);

        $hairType = HairType::findOrFail($validatedData['hair_type_id']);
        $totalPrice = ($validatedData['unit_price'] + $hairType->price) * $validatedData['quantity'];

        $serviceDetail->update([
            'service_id' => $validatedData['service_id'],
            'hair_type_id' => $validatedData['hair_type_id'],
            'quantity' => $validatedData['quantity'],
            'unit_price' => $validatedData['unit_price'],
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('service.index', $serviceDetail->appointment_id)
                         ->with('success', 'Servicio actualizado correctamente');
    }

    // Eliminar un servicio
    public function destroy($serviceDetailId)
    {
        $serviceDetail = ServiceDetail::findOrFail($serviceDetailId);
        $appointmentId = $serviceDetail->appointment_id;

        $serviceDetail->delete();

        return redirect()->route('service.index', $appointmentId)
                         ->with('success', 'Servicio eliminado correctamente');
    }

    // Mostrar los detalles de una cita específica
    public function showAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);

        return view('service.create', ['appointmentId' => $appointment->id]);
    }
}
