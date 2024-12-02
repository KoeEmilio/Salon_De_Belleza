<?php

namespace App\Http\Controllers;

use App\Models\EmployeeData;
use Illuminate\Http\Request;
use App\Models\EmployeeHour;
use App\Models\Payroll;
use App\Models\User;

class HorasTrabajadasController extends Controller
{
    public function index($nomina_id)
    {
        // Obtener la nómina para el periodo
        $nomina = Payroll::findOrFail($nomina_id);
    
        // Obtener el empleado asociado a la nómina
        $empleado = User::findOrFail($nomina->employee_id);
        
        // Obtener las horas trabajadas dentro del rango de la nómina
        $horasTrabajadas = EmployeeHour::where('employee_id', $empleado->id)
            ->whereBetween('date_worked', [$nomina->period_start, $nomina->period_end])
            ->get();
        
        // Retornar la vista con los datos
        return view('horastrabajadas', compact('empleado', 'horasTrabajadas', 'nomina', 'nomina_id'));
    }
    

    public function create($nomina_id, $empleado_id)
{
    // Obtener el empleado y la nómina si es necesario
    $empleado = EmployeeData::find($empleado_id);
    $nomina = Payroll::find($nomina_id);

    // Devolver la vista con los datos
    return view('agregar_horastrabajadas', compact('empleado', 'nomina'));
}

public function store(Request $request)
{
    // Validación de los datos del formulario
    $request->validate([
        'date_worked' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i',
    ]);

    // Guardar las horas trabajadas
    $horaTrabajada = new EmployeeHour();
    $horaTrabajada->employee_id = $request->empleado_id;
    $horaTrabajada->date_worked = $request->date_worked;
    $horaTrabajada->start_time = $request->start_time;
    $horaTrabajada->end_time = $request->end_time;

    // Calcular las horas trabajadas y las horas extras si es necesario
    // Aquí puedes usar tu lógica para calcular las horas y las horas extras.
    $horaTrabajada->save();

    // Redirigir con un mensaje de éxito
    return redirect()->route('horas_trabajadas.index', ['nomina_id' => $request->nomina_id, 'empleado_id' => $request->empleado_id])
                     ->with('success', 'Horas trabajadas registradas correctamente.');
}
public function edit($nomina_id, $empleado_id, $id)
{
    // Obtén el registro de horas trabajadas usando el ID
    $hora = EmployeeHour::find($id);  // Asegúrate de usar el nombre de tu modelo correctamente

    // Verifica que la hora existe
    if (!$hora) {
        return redirect()->route('horas_trabajadas.index')->with('error', 'Hora trabajada no encontrada');
    }

    // Obtén los detalles de la nómina y el empleado (si es necesario)
    $empleado = EmployeeData::find($empleado_id);  // Usa el modelo adecuado
    $nomina = Payroll::find($nomina_id);  // Usa el modelo adecuado

    // Pasa las variables a la vista
    return view('editar_horastrabajadas', compact('hora', 'nomina', 'empleado', 'empleado_id', 'nomina_id'));
}




public function update(Request $request, $nomina_id, $empleado_id, $id)
{
    // Encuentra la hora trabajada con el ID
    $hora = EmployeeHour::find($id);

    // Si no se encuentra, redirige con un mensaje de error
    if (!$hora) {
        return redirect()->route('horas_trabajadas.index')->with('error', 'Hora trabajada no encontrada');
    }

    // Valida y actualiza los campos
    $request->validate([
        'date_worked' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i',
    ]);

    $hora->date_worked = $request->input('date_worked');
    $hora->start_time = $request->input('start_time');
    $hora->end_time = $request->input('end_time');
    $hora->save();

    // Redirige con un mensaje de éxito
    return redirect()->route('horas_trabajadas.index', ['nomina_id' => $nomina_id, 'empleado_id' => $empleado_id])
                     ->with('success', 'Horas trabajadas actualizadas exitosamente');
}
public function destroy($nomina_id, $empleado_id, $id)
{
    // Encuentra la hora trabajada que se quiere eliminar
    $hora = EmployeeHour::find($id);

    // Si no se encuentra el registro, redirige con un mensaje de error
    if (!$hora) {
        return redirect()->route('horas_trabajadas.index', ['nomina_id' => $nomina_id, 'empleado_id' => $empleado_id])
                         ->with('error', 'Hora trabajada no encontrada');
    }

    // Elimina la entrada de horas trabajadas
    $hora->delete();

    // Redirige con un mensaje de éxito
    return redirect()->route('horas_trabajadas.index', ['nomina_id' => $nomina_id, 'empleado_id' => $empleado_id])
                     ->with('success', 'Hora trabajada eliminada exitosamente');
}
}
