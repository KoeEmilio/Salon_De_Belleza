<?php

namespace App\Http\Controllers;

use App\Models\EmployeeShift;
use App\Models\Shift;
use Illuminate\Http\Request;
use App\Models\EmployeeData;

class TurnosController extends Controller
{
    // Mostrar los turnos de un empleado
    public function index($employee_id)
    {
        // Obtener los turnos asignados al empleado
        $turnos = EmployeeShift::with('shift') // Cargar el turno asociado
            ->where('employee_id', $employee_id) // Filtrar por el empleado
            ->get();

        // Retornar la vista con los datos
        return view('turnos', compact('turnos', 'employee_id'));
    }

    // Crear un nuevo turno
    public function create($employee_id)
    {
        // Obtener los turnos disponibles (mañana y tarde)
        $shifts = Shift::all();
        return view('agregar_turnos', ['employee_id' => $employee_id, 'shifts' => $shifts]);
    }

    // Guardar un nuevo turno
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'day' => 'required|string|max:15',
            'shift_id' => 'required|exists:shifts,id',
        ]);

        dd($validated);
        // Crear el registro en `employee_shift`
        EmployeeShift::create([
            'employee_id' => $request->employee_id, // Asegúrate de pasar el `employee_id` desde el formulario
            'day' => $validated['day'],
            'shift_id' => $validated['shift_id'], // Asociar el turno
        ]);

        // Redirigir con éxito
        return redirect()->route('turnos.index', ['employee_id' => $request->employee_id])->with('success', 'Turno agregado correctamente.');
    }

    // Editar un turno
    public function edit($id)
    {
        $turno = EmployeeShift::with('shift')->findOrFail($id);
        $shifts = Shift::all();
        return view('editar_turnos', compact('turno', 'shifts'));
    }

    // Actualizar un turno
    public function update(Request $request, $id)
    {
        $request->validate([
            'day' => 'required|string|max:15',
            'shift_id' => 'required|exists:shifts,id',
        ]);

        $turno = EmployeeShift::findOrFail($id);
        $turno->update([
            'day' => $request->day,
            'shift_id' => $request->shift_id,
        ]);

        return redirect()->route('turnos.index', ['employee_id' => $turno->employee_id])->with('success', 'Turno actualizado correctamente.');
    }

    // Eliminar un turno
    public function destroy($id)
    {
        $turno = EmployeeShift::findOrFail($id);
        $employee_id = $turno->employee_id;
        $turno->delete();

        return redirect()->route('turnos.index', ['employee_id' => $employee_id])->with('success', 'Turno eliminado correctamente.');
    }
}
