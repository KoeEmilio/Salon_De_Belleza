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
    public function index()
    {
        $clientes = PeopleData::all();
        $servicios = Service::all(); 
        $citas = Appointment::with(['owner', 'services'])->paginate(5); // Esto devuelve un objeto LengthAwarePaginator

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

    /**
     * Almacenar una nueva cita.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'name' => 'required|string|alpha|max:15',
            'last_name' => 'required|string|alpha|max:20',
            'age' => 'required|integer',
            'gender' => 'required|in:H,M',
            'phone' => 'required|string|size:10',
            'appointment_day' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'status' => 'required|in:pendiente,confirmada,cancelada',
            'payment_type' => 'required|in:efectivo,transferencia',
            'employee_id' => 'required|exists:employees_data,id', // Asegúrate de validar que el employee_id es válido
        ]);
    
        // Comprobar si ya existe una cita en la misma fecha y hora
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
    
        $cita = Appointment::create([
            'owner_id' => $cliente->id,
            'appointment_day' => $request->appointment_day,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
            'payment_type' => $request->payment_type,
            'employee_id' => $request->employee_id, // Asignar el empleado seleccionado
            'sign_up_date' => now(),
        ]);
    
        // Si el estado de la cita es "confirmada", crea una nueva orden
        if ($cita->status == 'confirmada') {
            Order::create([
                'client_id' => $cliente->id, // Asignar el id del cliente
                'employee_id' => $request->employee_id, // Asegúrate de que este valor esté presente en el request
            ]);
        }
    
        return redirect()->route('appointment.index')->with('success', 'Cita creada con éxito');
    }
    /**
     * Mostrar los servicios de una cita.
     */
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

    /**
     * Actualizar una cita.
     */
    public function update(Request $request, $id)
{
    // Validación de datos
    $request->validate([
        'employee_id' => 'required|exists:employees_data,id',
        
    ]);

    $cita = Appointment::findOrFail($id);

    // Actualización de la cita con el empleado seleccionado
    $cita->update([
        'employee_id' => $request->employee_id,
        // otros campos...
    ]);

    // Crear orden si la cita es confirmada
    if ($request->status == 'confirmada') {
        $cliente = $cita->owner; // Obtener el cliente

        // Crear una nueva orden asociada a la cita y al cliente
        Order::create([
            'client_id' => $cliente->id, 
            'employee_id' => $request->employee_id,
        ]);
    }

    return redirect()->route('appointment.index')->with('success', 'Cita actualizada con éxito');
}

    /**
     * Actualizar el estado de una cita.
     */
    public function updateStatus(Request $request, $id)
    {
        $cita = Appointment::findOrFail($id);

        // Verificar si el estado cambia a "confirmada"
        if ($request->status == 'confirmada' && $cita->status != 'confirmada') {
            // Crear una nueva orden asociada a la cita
            Order::create([
                'client_id' => $cita->owner_id, // Obtener el cliente
                'employee_id' => $request->employee_id, // Asegúrate de que el employee_id esté en el request
            ]);
        }

        // Actualizar el estado de la cita
        $cita->update([
            'status' => $request->status,
        ]);

        return redirect()->route('appointment.index')->with('success', 'Estado de la cita actualizado con éxito');
    }
}
