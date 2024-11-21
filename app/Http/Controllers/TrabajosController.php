<?php

namespace App\Http\Controllers;

use App\Models\EmployeeHour;
use Illuminate\Http\Request;

class TrabajosController extends Controller
{
    // Mostrar todas las horas trabajadas
    public function index()
    {
        $employeeHours = EmployeeHour::with('employee.person')->get();
        return view('trabajos', compact('employeeHours'));
    }

    // Agregar nuevas horas trabajadas
    public function create()
    {
        return view('trabajos.create');
    }

    public function store(Request $request)
    {
        EmployeeHour::create($request->all());
        return redirect()->route('trabajos.index');
    }

    // Editar horas trabajadas
    public function edit($id)
    {
        $employeeHour = EmployeeHour::find($id);
        return view('trabajos.edit', compact('employeeHour'));
    }

    // Actualizar horas trabajadas
    public function update(Request $request, $id)
    {
        $employeeHour = EmployeeHour::find($id);
        $employeeHour->update($request->all());
        return redirect()->route('trabajos.index');
    }

    // Eliminar horas trabajadas
    public function destroy($id)
    {
        EmployeeHour::find($id)->delete();
        return redirect()->route('trabajos.index');
    }
}
