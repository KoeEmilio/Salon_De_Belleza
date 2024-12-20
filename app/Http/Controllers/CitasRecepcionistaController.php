<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PeopleData;
use App\Models\Appointment;
use App\Models\EmployeeData;
use App\Models\Service;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class CitasRecepcionistaController extends Controller
{
   
    public function index(Request $request)
    {
        $fecha = $request->input('fecha');
        $nombre = $request->input('nombre');
    
        $citas = Appointment::with(['owner', 'services'])
            ->when($fecha, function ($query, $fecha) {
                return $query->whereDate('appointment_day', $fecha); 
            })
            ->when($nombre, function ($query, $nombre) {
                return $query->whereHas('owner', function ($q) use ($nombre) {
                    $q->where('first_name', 'like', "%$nombre%")
                      ->orWhere('last_name', 'like', "%$nombre%");
                });
            })
            ->paginate(5);
    
        $clientes = PeopleData::all();
        $servicios = Service::all();
    
        return view('citas_recepcionista', compact('clientes', 'servicios', 'citas'));
    }

   
    public function create()
    {
        $clientes = PeopleData::all();
        $empleados = EmployeeData::all();  
        return view('agregar_cita', compact('clientes', 'empleados'));
    }

  
    public function store(Request $request)
    {
        
        $request->validate([
            'appointment_day' => 'required|date|after_or_equal:' . now()->toDateString(),
            'appointment_time' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($request) {
                    $appointmentDay = $request->input('appointment_day');
                    $appointmentTime = \Carbon\Carbon::parse("$appointmentDay $value");
                    $currentDateTime = \Carbon\Carbon::now();
                    $startTime = \Carbon\Carbon::parse("$appointmentDay 07:00");
                    $endTime = \Carbon\Carbon::parse("$appointmentDay 23:00");

                    if ($appointmentTime < $currentDateTime) {
                        $fail('La hora de la cita no puede ser en el pasado.');
                    }

                    if ($appointmentTime < $startTime || $appointmentTime > $endTime) {
                        $fail('La hora de la cita debe estar entre las 7:00 AM y las 11:00 PM.');
                    }
                },
            ],
        ], [
            'appointment_day.required' => 'La fecha de la cita es obligatoria.',
            'appointment_day.date' => 'La fecha debe ser válida.',
            'appointment_day.after_or_equal' => 'La fecha de la cita no puede ser anterior a la fecha actual.',
            'appointment_time.required' => 'La hora de la cita es obligatoria.',
            'appointment_time.date_format' => 'La hora debe tener el formato HH:MM.',
        ]);

        $cliente = PeopleData::create([
            'first_name' => $request->name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'user_id' => auth()->id(),
        ]);

        $cita = Appointment::create([
            'owner_id' => $cliente->id,
            'appointment_day' => $request->appointment_day,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
            'payment_type' => $request->payment_type,
            'sign_up_date' => now(),
        ]);

        if ($cita->status == 'confirmada') {
            Order::create(['client_id' => $cliente->id]);
        }

        return redirect()->route('appointment.index')->with('success', 'Cita creada con éxito');
    }


   
    public function showServices($id)
    {
        $cita = Appointment::with('services')->findOrFail($id);
        return view('ver_servicios', compact('cita'));
    }


    public function edit($id)
    {
        $cita = Appointment::findOrFail($id);
        $clientes = PeopleData::all();
        $empleados = EmployeeData::all();  
        return view('editar_cita', compact('cita', 'clientes', 'empleados'));
    }

    public function update(Request $request, $id)
    {
        $cita = Appointment::findOrFail($id);

        $request->validate([
            'appointment_day' => 'required|date|after_or_equal:' . now()->toDateString(),
            'appointment_time' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($request) {
                    $appointmentDay = $request->input('appointment_day');
                    $appointmentTime = \Carbon\Carbon::parse("$appointmentDay $value");
                    $currentDateTime = \Carbon\Carbon::now();
                    $startTime = \Carbon\Carbon::parse("$appointmentDay 07:00");
                    $endTime = \Carbon\Carbon::parse("$appointmentDay 23:00");

                    if ($appointmentTime < $currentDateTime) {
                        $fail('La hora de la cita no puede ser en el pasado.');
                    }

                    if ($appointmentTime < $startTime || $appointmentTime > $endTime) {
                        $fail('La hora de la cita debe estar entre las 7:00 AM y las 11:00 PM.');
                    }
                },
            ],
        ]);

        $cita->update([
            'appointment_day' => $request->appointment_day,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
        ]);

        if ($request->status == 'confirmada' && $cita->status != 'confirmada') {
            Order::create(['client_id' => $cita->owner_id]);
        }

        return redirect()->route('appointment.index')->with('success', 'Cita actualizada con éxito');
    }

    
    public function updateStatus(Request $request, $id)
    {
        $cita = Appointment::findOrFail($id);

        if ($request->status == 'confirmada' && $cita->status != 'confirmada') {
            Order::create([
                'client_id' => $cita->owner_id, 
            ]);
        }

        $cita->update([
            'status' => $request->status,
        ]);

        return redirect()->route('appointment.index')->with('success', 'Estado de la cita actualizado con éxito');
    }
}
