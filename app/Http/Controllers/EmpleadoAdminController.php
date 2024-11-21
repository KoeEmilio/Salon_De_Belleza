<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeData;
use App\Models\EmployeeHour;
use App\Models\Payroll;
use App\Models\Shift;
class EmpleadoAdminController extends Controller
{
   
    public function nominas()
    {
        $payrolls = Payroll::with('EmployeeData.peopleData')->get();
        return view('nominas', compact('payrolls'));
    }

   
    public function turnos()
    {
        $shifts = Shift::all();
        return view('turnos', compact('shifts'));
    }

    public function trabajos()
    {
        $employeeHours = EmployeeHour::with('employee.person')->get();
        return view('trabajos', compact('employeeHours'));
    }
}
