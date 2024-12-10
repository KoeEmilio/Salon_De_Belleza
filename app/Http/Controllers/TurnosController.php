<?php

namespace App\Http\Controllers;

use App\Models\EmployeeShift;
use App\Models\Shift;
use Illuminate\Http\Request;

class TurnosController extends Controller
{
    public function index($employee_id)
    {
        $turnos = EmployeeShift::with('shift') 
            ->where('employee_id', $employee_id) 
            ->get();

        return view('turnos', compact('turnos', 'employee_id'));
    }

    public function create($employee_id)
    {
        $shifts = Shift::all();
        return view('agregar_turnos', ['employee_id' => $employee_id, 'shifts' => $shifts]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'day' => 'required|string|max:15',
            'shift_id' => 'required|exists:shifts,id',
        ]);

        dd($validated);
        EmployeeShift::create([
            'employee_id' => $request->employee_id, 
            'day' => $validated['day'],
            'shift_id' => $validated['shift_id'], 
        ]);

        return redirect()->route('turnos.index', ['employee_id' => $request->employee_id])->with('success', 'Turno agregado correctamente.');
    }

    public function edit($id)
    {
        $turno = EmployeeShift::with('shift')->findOrFail($id);
        $shifts = Shift::all();
        return view('editar_turnos', compact('turno', 'shifts'));
    }

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

    public function destroy($id)
    {
        $turno = EmployeeShift::findOrFail($id);
        $employee_id = $turno->employee_id;
        $turno->delete();

        return redirect()->route('turnos.index', ['employee_id' => $employee_id])->with('success', 'Turno eliminado correctamente.');
    }
}
