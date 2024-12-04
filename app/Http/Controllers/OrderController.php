<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ServiceDetail;
use App\Models\Appointment;
use App\Models\EmployeeData;

class OrderController extends Controller
{
    
    public function createOrder(Appointment $appointment)
{
    // Verificar si la cita ya tiene una orden asociada
    $existingOrder = $appointment->orders()->first();  // Asumiendo que tienes una relación 'orders' en el modelo Appointment
    
    if ($existingOrder) {
        return redirect()->route('orders.show', $existingOrder->id)
            ->with('error', 'Ya se ha creado una orden para esta cita.');
    }

    // Obtener los servicios de la cita
    $services = $appointment->serviceDetails;
    if ($services->isEmpty()) {
        return redirect()->back()->with('error', 'No se pueden levantar órdenes sin servicios asignados.');
    }

    // Seleccionar un empleado aleatorio
    $employee = EmployeeData::inRandomOrder()->first();

    // Crear la orden
    $order = new Order();
    $order->client_id = $appointment->owner_id; 
    $order->employee_id = $employee->id; 
    $order->save();

    // Asociar los servicios a la orden
    foreach ($services as $service) {
        $service->order_id = $order->id;
        $service->save();
    }

    // Relacionar la orden con la cita
    $order->appointments()->attach($appointment->id);

    return redirect()->route('orders.show', $order->id)->with('success', 'Orden creada exitosamente.');
}

public function show($id)
{
    $order = Order::with(['client', 'employee', 'details.service', 'appointments'])->findOrFail($id);
    $employees = EmployeeData::all();  // Obtener todos los empleados para mostrarlos en el formulario

    return view('levantar_orden', compact('order', 'employees')); // Aquí debes pasar 'employees' y no 'empleado'
}
   
    public function index()
    {
        $orders = Order::with('client', 'employee')->paginate(10);

        return view('orders.index', compact('orders'));
    }

  
    public function create($appointmentId)
    {
        $appointment = Appointment::with('serviceDetails.service')->findOrFail($appointmentId);
        $employees = EmployeeData::all();

        return view('orders.create', compact('appointment', 'employees'));
    }
    
}
