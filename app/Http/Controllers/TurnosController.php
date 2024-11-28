<?php

// TurnosController.php
namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\EmployeeShift;
use App\Models\Shift;
use App\Models\User;
use App\Models\EmployeeData;
use Illuminate\Http\Request;
use App\Models\EmployeeHour;

class TurnosController extends Controller
{
    // Método para ver los turnos de un empleado específico
    public function index($employee_id)
{
    // Verificamos que el empleado exista
    $empleado = EmployeeData::findOrFail($employee_id);
    $empleado = User::findOrFail($employee_id); // Aquí debes asegurarte que sea el empleado correcto

    // Obtener los turnos del empleado
    $turnos = EmployeeShift::where('employee_id', $employee_id)
                           ->with('shift')
                           ->get();

    // Pasamos los turnos a la vista
    return view('turnos', compact('turnos', 'empleado'));
}
    public function edit($id)
    {
        // Obtener la hora del empleado por su ID
        $employeeHour = EmployeeHour::findOrFail($id);
    
        // Pasar la variable a la vista
        return view('editar_turno', compact('employeeHour'));
    }
    

// Método para actualizar el turno
public function update(Request $request, $id)
{
    // Validación de los datos de entrada
    $request->validate([
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i',
    ]);

    // Buscar el registro que se va a actualizar
    $employeeHour = EmployeeHour::findOrFail($id);

    // Actualizar los campos de hora
    $employeeHour->start_time = $request->input('start_time');
    $employeeHour->end_time = $request->input('end_time');

    // Calcular horas trabajadas y horas extras
    $start_time = \Carbon\Carbon::parse($employeeHour->start_time);
    $end_time = \Carbon\Carbon::parse($employeeHour->end_time);
    $employeeHour->hours_worked = $end_time->diffInHours($start_time);
    $employeeHour->overtime_hours = max(0, $employeeHour->hours_worked - 8);

    // Mostrar los datos antes de guardar
    // Verifica los valores actualizados antes de guardar

    // Guardar la actualización
    $employeeHour->save();

    // Redirigir con un mensaje de éxito
    return redirect()->route('turnos.index', ['employee_id' => $employeeHour->employee_id])
    ->with('success', 'Horas actualizadas correctamente');

}



}
