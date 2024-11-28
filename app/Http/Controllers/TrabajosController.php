<?php

namespace App\Http\Controllers;

use App\Models\EmployeeHour;
use App\Models\EmployeeData;  // Asegúrate de importar el modelo Employee
use Illuminate\Http\Request;
use App\Models\User;
class TrabajosController extends Controller
{
    public function index($employee_id)
    {
        // Verifica si existe EmployeeData con el ID proporcionado
        $empleadoData = EmployeeData::find($employee_id);
    
        if (!$empleadoData) {
            return redirect()->back()->withErrors(['message' => 'Empleado no encontrado.']);
        }
    
        // Encuentra al usuario asociado
        $empleado = User::find($empleadoData->user_id);
    
        if (!$empleado) {
            return redirect()->back()->withErrors(['message' => 'Usuario asociado no encontrado.']);
        }
    
        // Obtén las horas trabajadas
        $employeeHours = EmployeeHour::where('employee_id', $employee_id)->get();
    
        if ($employeeHours->isEmpty()) {
            return view('trabajos', compact('employeeHours', 'empleado'))
                ->with('message', 'No hay registros de trabajos para este empleado.');
        }
    
        return view('trabajos', compact('employeeHours', 'empleado'));
    }
    
    
    
}
