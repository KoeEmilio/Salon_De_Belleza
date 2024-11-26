<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\EmployeeData;
use Illuminate\Http\Request;

class NominaController extends Controller
{
    // Mostrar todas las nóminas
    public function index()
    {
        $payrolls = Payroll::with('employee')->get(); // Obtener nóminas con los empleados
        return view('nominas', compact('payrolls'));
    }

}
