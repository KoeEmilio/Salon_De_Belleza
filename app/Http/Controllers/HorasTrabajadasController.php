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
        $nomina = Payroll::findOrFail($nomina_id);
    
        $empleado = User::findOrFail($nomina->employee_id);
        
        $horasTrabajadas = EmployeeHour::where('employee_id', $empleado->id)
            ->whereBetween('date_worked', [$nomina->period_start, $nomina->period_end])
            ->get();
        
        return view('horastrabajadas', compact('empleado', 'horasTrabajadas', 'nomina', 'nomina_id'));
    }
    

    public function create($nomina_id, $empleado_id)
{
    $empleado = EmployeeData::find($empleado_id);
    $nomina = Payroll::find($nomina_id);

    return view('agregar_horastrabajadas', compact('empleado', 'nomina'));
}

public function store(Request $request)
{
    $request->validate([
        'date_worked' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i',
    ]);

    $horaTrabajada = new EmployeeHour();
    $horaTrabajada->employee_id = $request->empleado_id;
    $horaTrabajada->date_worked = $request->date_worked;
    $horaTrabajada->start_time = $request->start_time;
    $horaTrabajada->end_time = $request->end_time;
    $horaTrabajada->save();

    return redirect()->route('horas_trabajadas.index', ['nomina_id' => $request->nomina_id, 'empleado_id' => $request->empleado_id])
                     ->with('success', 'Horas trabajadas registradas correctamente.');
}
public function edit($nomina_id, $empleado_id, $id)
{
    $hora = EmployeeHour::find($id);  


    if (!$hora) {
        return redirect()->route('horas_trabajadas.index')->with('error', 'Hora trabajada no encontrada');
    }

    $empleado = EmployeeData::find($empleado_id); 
    $nomina = Payroll::find($nomina_id); 

    return view('editar_horastrabajadas', compact('hora', 'nomina', 'empleado', 'empleado_id', 'nomina_id'));
}




public function update(Request $request, $nomina_id, $empleado_id, $id)
{
    $hora = EmployeeHour::find($id);

    if (!$hora) {
        return redirect()->route('horas_trabajadas.index')->with('error', 'Hora trabajada no encontrada');
    }

    $request->validate([
        'date_worked' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i',
    ]);

    $hora->date_worked = $request->input('date_worked');
    $hora->start_time = $request->input('start_time');
    $hora->end_time = $request->input('end_time');
    $hora->save();

    return redirect()->route('horas_trabajadas.index', ['nomina_id' => $nomina_id, 'empleado_id' => $empleado_id])
                     ->with('success', 'Horas trabajadas actualizadas exitosamente');
}
public function destroy($nomina_id, $empleado_id, $id)
{
    $hora = EmployeeHour::find($id);

    if (!$hora) {
        return redirect()->route('horas_trabajadas.index', ['nomina_id' => $nomina_id, 'empleado_id' => $empleado_id])
                         ->with('error', 'Hora trabajada no encontrada');
    }

    $hora->delete();

    return redirect()->route('horas_trabajadas.index', ['nomina_id' => $nomina_id, 'empleado_id' => $empleado_id])
                     ->with('success', 'Hora trabajada eliminada exitosamente');
}
}
