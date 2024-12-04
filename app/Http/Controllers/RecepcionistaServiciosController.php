<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\ServiceDetail;
use App\Models\HairType;
use Illuminate\Http\Request;

class RecepcionistaServiciosController extends Controller
{
    // Mostrar los servicios y detalles de una cita
    public function index($appointmentId)
    {
        $cita = Appointment::with('services', 'serviceDetails')->findOrFail($appointmentId);
        $allServices = Service::all();

        return view('ver_servicios', compact('cita', 'allServices'));
    }

    // Crear un nuevo servicio para una cita específica
    public function create($appointmentId)
    {
        // Buscar la cita por ID
        $cita = Appointment::findOrFail($appointmentId);
    
        $services = Service::all();
        $hairTypes = HairType::all();
    
        // Devolver la vista con los servicios, tipos de cabello y la cita
        return view('agregar_servicio', compact('cita', 'services', 'hairTypes', 'appointmentId'));
    }

    // Almacenar un nuevo servicio en la base de datos
    public function store(Request $request, $appointmentId)
{
    // Validación de los datos
    $validatedData = $request->validate([
        'service_id' => 'required|exists:services,id',
        'hair_type_id' => 'required|exists:hair_type,id',
        'quantity' => 'required|integer|min:1',
        'unit_price' => 'required|numeric|min:0',
    ]);

    // Obtener el precio adicional del tipo de cabello seleccionado
    $hairType = HairType::find($validatedData['hair_type_id']);
    $hair_extra_price = $hairType->price;

    // Calcular el total manualmente, aunque si 'total_price' es calculado por la base de datos, esto no es necesario
    $unit_price = $validatedData['unit_price'];
    $total_price = ($unit_price + $hair_extra_price) * $validatedData['quantity'];

    // Crear un nuevo registro en service_details
    $serviceDetail = new ServiceDetail();
    $serviceDetail->service_id = $validatedData['service_id'];
    $serviceDetail->hair_type_id = $validatedData['hair_type_id'];
    $serviceDetail->quantity = $validatedData['quantity'];
    $serviceDetail->unit_price = $unit_price;
    // No establecer 'total_price' si la columna es generada en la base de datos
    // $serviceDetail->total_price = $total_price; 

    // Asociar la cita al detalle del servicio
    $serviceDetail->appointment_id = $appointmentId;

    // Guardar en la base de datos
    $serviceDetail->save();

    // Redirigir o mostrar mensaje de éxito
    return redirect()->route('service.index', $appointmentId)->with('success', 'Servicio agregado correctamente');
}
    // Mostrar los detalles de una cita específica
    public function showAppointment($id)
    {
        // Obtener la cita con el ID correspondiente
        $appointment = Appointment::find($id);
    
        if (!$appointment) {
            // Manejar si no se encuentra la cita
            return redirect()->route('appointment.index')->with('error', 'Cita no encontrada');
        }
    
        // Pasar la cita (o el ID de la cita) a la vista
        return view('service.create', ['appointmentId' => $appointment->id]);
    }

    // Editar un servicio existente
    public function edit($serviceDetailId)
    {
        // Buscar el detalle del servicio
        $serviceDetail = ServiceDetail::findOrFail($serviceDetailId);
        $hairTypes = HairType::all(); // Obtener todos los tipos de cabello
        $cita = $serviceDetail->appointment;
        $services = Service::all();

        return view('editar_servicio', compact('serviceDetail', 'cita', 'services', 'hairTypes'));
    }

    // Actualizar un servicio
    public function update(Request $request, $appointmentId, $serviceDetailId)
    {
        // Buscar el detalle del servicio
        $serviceDetail = ServiceDetail::findOrFail($serviceDetailId);
    
        // Validación de los datos
        $validatedData = $request->validate([
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'hair_type_id' => 'required|exists:hair_type,id',
        ]);
    
        // Obtener el precio adicional del tipo de cabello seleccionado
        $hairType = HairType::find($validatedData['hair_type_id']);
        $hair_extra_price = $hairType->price;
    
        // Calcular el total (aunque no deberías insertar esto si `total_price` es calculado)
        $unit_price = $validatedData['unit_price'];
        $total_price = ($unit_price + $hair_extra_price) * $validatedData['quantity'];
    
        // Actualizar los datos del servicio
        $serviceDetail->service_id = $validatedData['service_id'];  // Asegúrate de actualizar el service_id
        $serviceDetail->quantity = $validatedData['quantity'];
        $serviceDetail->unit_price = $unit_price;
        $serviceDetail->hair_type_id = $validatedData['hair_type_id'];
    
        // Guardar los cambios
        $serviceDetail->save();
    
        // Redirigir con mensaje de éxito
        return redirect()->route('service.index', $appointmentId)->with('success', 'Servicio actualizado correctamente');
    }


    // Eliminar un servicio
    public function destroy($serviceDetailId)
    {
        // Buscar el detalle del servicio
        $serviceDetail = ServiceDetail::findOrFail($serviceDetailId);
        
        // Eliminar el detalle de servicio
        $serviceDetail->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('service.index', $serviceDetail->appointment_id)->with('success', 'Servicio eliminado correctamente');
    }
}
