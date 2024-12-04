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
    /**
     * Mostrar la vista principal con citas y datos necesarios.
     */
    public function index(Request $request)
    {
        // Obtener los parámetros de búsqueda
        $fecha = $request->input('fecha');
        $nombre = $request->input('nombre');
    
        // Filtrar citas por fecha y nombre del cliente
        $citas = Appointment::with(['owner', 'services'])
            ->when($fecha, function ($query, $fecha) {
                return $query->whereDate('appointment_day', $fecha); // Filtrar por fecha
            })
            ->when($nombre, function ($query, $nombre) {
                return $query->whereHas('owner', function ($q) use ($nombre) {
                    $q->where('first_name', 'like', "%$nombre%")
                      ->orWhere('last_name', 'like', "%$nombre%");
                });
            })
            ->paginate(5);
    
        // Obtener clientes y servicios
        $clientes = PeopleData::all();
        $servicios = Service::all();
    
        return view('citas_recepcionista', compact('clientes', 'servicios', 'citas'));
    }

    /**
     * Mostrar formulario para crear una nueva cita.
     */
    public function create()
    {
        $clientes = PeopleData::all();
        $empleados = EmployeeData::all();  // Obtener todos los empleados
        return view('agregar_cita', compact('clientes', 'empleados'));
    }

  
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'name' => 'required|string|alpha|max:15',
            'last_name' => 'required|string|alpha|max:20',
            'age' => 'required|integer|min:0|max:120',
            'gender' => 'required|in:H,M',
            'phone' => 'required|digits:10|regex:/^[0-9]{10}$/',
            'appointment_day' => 'required|date|after_or_equal:' . now()->toDateString(),
'appointment_time' => 'required|date_format:H:i|after:' . now()->toDateString() . ' ' . now()->format('H:i'),
            'status' => 'required|in:pendiente,confirmada,cancelada',
            'payment_type' => 'required|in:efectivo,transferencia',
        ],[
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.alpha' => 'El nombre solo puede contener letras.',
            'name.max' => 'El nombre no puede tener más de 15 caracteres.',
            
            'last_name.required' => 'El apellido es obligatorio.',
            'last_name.string' => 'El apellido debe ser una cadena de texto.',
            'last_name.alpha' => 'El apellido solo puede contener letras.',
            'last_name.max' => 'El apellido no puede tener más de 20 caracteres.',
            
            'age.required' => 'La edad es obligatoria.',
            'age.integer' => 'La edad debe ser un número entero.',
            'age.min' => 'La edad no puede ser menor a 0.',
            'age.max' => 'La edad no puede ser mayor a 120.',
            
            'gender.required' => 'El género es obligatorio.',
            'gender.in' => 'El género debe ser uno de los siguientes: H (Hombre), M (Mujer).',
            
            'phone.required' => 'El número de teléfono es obligatorio.',
            'phone.digits' => 'El número de teléfono debe tener 10 dígitos.',
            'phone.regex' => 'El número de teléfono debe ser un número válido de 10 dígitos.',
            
            'appointment_day.required' => 'La fecha de la cita es obligatoria.',
            'appointment_day.date' => 'La fecha debe ser válida.',
            'appointment_day.after_or_equal' => 'La fecha de la cita no puede ser anterior a la fecha actual.',
           
            'appointment_time.after' => 'La hora de la cita debe ser posterior a la hora actual.',
            'appointment_time.required' => 'La hora de la cita es obligatoria.',
            'appointment_time.date_format' => 'La hora debe tener el formato HH:MM.',
            
            'status.required' => 'El estado de la cita es obligatorio.',
            'status.in' => 'El estado debe ser uno de los siguientes: pendiente, confirmada, cancelada.',
            
            'payment_type.required' => 'El tipo de pago es obligatorio.',
            'payment_type.in' => 'El tipo de pago debe ser uno de los siguientes: efectivo, transferencia.',
        ]);

        // Verificar si ya existe una cita en la misma fecha y hora
        $existingAppointment = Appointment::where('appointment_day', $request->appointment_day)
                                          ->where('appointment_time', $request->appointment_time)
                                          ->exists();

        if ($existingAppointment) {
            return redirect()->back()
                             ->withErrors(['error' => 'Ya existe una cita en esta fecha y hora. Por favor, elija otro horario.'])
                             ->withInput();
        }

        // Crear un nuevo cliente en la tabla people_data
        $cliente = PeopleData::create([
            'first_name' => $request->name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'user_id' => auth()->id(),
        ]);

        // Crear la cita
        $cita = Appointment::create([
            'owner_id' => $cliente->id,
            'appointment_day' => $request->appointment_day,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
            'payment_type' => $request->payment_type,
            'sign_up_date' => now(),
        ]);

        // Crear orden si la cita es confirmada
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

    /**
     * Mostrar formulario para editar una cita.
     */
    public function edit($id)
    {
        $cita = Appointment::findOrFail($id);
        $clientes = PeopleData::all();
        $empleados = EmployeeData::all();  // Obtener todos los empleados
        return view('editar_cita', compact('cita', 'clientes', 'empleados'));
    }

    public function update(Request $request, $id)
    {
        $cita = Appointment::findOrFail($id);
    
        // Validar los datos
        $request->validate([
            'appointment_day' => 'required|date|after_or_equal:'.now()->toDateString(), // Asegura que la cita no esté en el pasado
            'appointment_time' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($request) {
                    $appointmentDay = $request->input('appointment_day');
                    $appointmentTime = \Carbon\Carbon::parse($appointmentDay . ' ' . $value);
                    $now = \Carbon\Carbon::now();
        
                    // Si la fecha seleccionada es hoy
                    if ($appointmentDay == $now->toDateString()) {
                        if ($appointmentTime <= $now) {
                            $fail('La hora de la cita debe ser posterior a la hora actual.');
                        }
                    }
                },
            ],
            'status' => 'required|in:pendiente,confirmada,cancelada',
        ], [
            'appointment_day.required' => 'La fecha de la cita es obligatoria.',
            'appointment_day.date' => 'La fecha debe ser válida.',
            'appointment_day.after_or_equal' => 'La fecha de la cita no puede ser anterior a la fecha actual.',
            
            'appointment_time.required' => 'La hora de la cita es obligatoria.',
            'appointment_time.date_format' => 'La hora debe tener el formato HH:MM.',
            'appointment_time.after' => 'La hora de la cita debe ser posterior a la hora actual.',
        ]);
    
        // Verificar si la cita no está duplicada
        $existingAppointment = Appointment::where('appointment_day', $request->appointment_day)
                                          ->where('appointment_time', $request->appointment_time)
                                          ->where('id', '!=', $id) // Excluir la cita actual
                                          ->exists();
    
        if ($existingAppointment) {
            return redirect()->back()
                             ->withErrors(['error' => 'Ya existe una cita en esta fecha y hora. Por favor, elija otro horario.'])
                             ->withInput();
        }
    
        // Actualizar la cita
        $cita->update([
            'appointment_day' => $request->appointment_day,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
        ]);
    
        // Crear orden si se confirma la cita
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
