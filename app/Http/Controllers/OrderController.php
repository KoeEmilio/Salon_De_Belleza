<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ServiceDetail;
use App\Models\Appointment;
use App\Models\EmployeeData;

class OrderController extends Controller
{
    
    public function createOrder(Request $request, Appointment $appointment)
    {
        if ($appointment->orders()->exists()) {
            return redirect()->back()->with('error', 'Esta cita ya tiene una orden levantada.');
        }

        $randomEmployee = EmployeeData::inRandomOrder()->first();
        if (!$randomEmployee) {
            return redirect()->back()->with('error', 'No hay empleados disponibles para asignar.');
        }

        $order = Order::create([
            'client_id' => $appointment->owner_id,
            'employee_id' => $randomEmployee->id,
        ]);

        foreach ($appointment->serviceDetails as $serviceDetail) {
            $serviceDetail->update(['order_id' => $order->id]);
        }

        $order->appointments()->attach($appointment->id);

        return redirect()->route('orders.show', $order->id)->with('success', 'Orden creada exitosamente con empleado asignado aleatoriamente.');
    }


    public function show($id)
    {
        $order = Order::with(['client', 'employee.person', 'details.service', 'appointments'])->findOrFail($id);

        return view('levantar_orden', compact('order'));
    }

 
    public function create($appointmentId)
    {
        $appointment = Appointment::with('serviceDetails.service')->findOrFail($appointmentId);

        return view('orders.create', compact('appointment'));
    }
}
