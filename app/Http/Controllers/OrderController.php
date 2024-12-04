<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ServiceDetail;
use App\Models\Appointment;
use App\Models\EmployeeData;

class OrderController extends Controller
{
    /**
     * Crear una orden para una cita específica con empleado asignado aleatoriamente
     */
    public function createOrder(Request $request, Appointment $appointment)
    {
        // Verificar que la cita no tenga ya una orden asociada
        if ($appointment->orders()->exists()) {
            return redirect()->back()->with('error', 'Esta cita ya tiene una orden levantada.');
        }

        // Obtener un empleado aleatorio
        $randomEmployee = EmployeeData::inRandomOrder()->first();
        if (!$randomEmployee) {
            return redirect()->back()->with('error', 'No hay empleados disponibles para asignar.');
        }

        // Crear la nueva orden con el empleado asignado aleatoriamente
        $order = Order::create([
            'client_id' => $appointment->owner_id,
            'employee_id' => $randomEmployee->id,
        ]);

        // Asociar los servicios de la cita a la orden
        foreach ($appointment->serviceDetails as $serviceDetail) {
            $serviceDetail->update(['order_id' => $order->id]);
        }

        // Asociar la cita con la orden
        $order->appointments()->attach($appointment->id);

        return redirect()->route('orders.show', $order->id)->with('success', 'Orden creada exitosamente con empleado asignado aleatoriamente.');
    }

    /**
     * Mostrar una orden específica con sus detalles
     */
    public function show($id)
    {
        $order = Order::with(['client', 'employee.person', 'details.service', 'appointments'])->findOrFail($id);

        return view('levantar_orden', compact('order'));
    }

    /**
     * Mostrar formulario para crear una orden a partir de una cita (opcional)
     */
    public function create($appointmentId)
    {
        $appointment = Appointment::with('serviceDetails.service')->findOrFail($appointmentId);

        return view('orders.create', compact('appointment'));
    }
}
