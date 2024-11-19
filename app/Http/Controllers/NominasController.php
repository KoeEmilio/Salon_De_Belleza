<?php
namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;

class NominasController extends Controller
{
    public function index()
    {
        // Obtener todas las nóminas con los datos del empleado y la persona
        $payrolls = Payroll::with('EmployeeData.peopleData')->get();  // Cargar empleados relacionados con 'person'
        
        // Asegurarse de que la variable se pasa correctamente a la vista
        return view('nominas', compact('payrolls'));
    }
    
    public function show($id)
    {
        // Obtener una nómina con el empleado relacionado
        $payroll = Payroll::with('EmployeeData.peopleData')->findOrFail($id);
        return view('nominas.show', compact('payroll'));
    }

    public function markAsPaid($id)
    {
        $payroll = Payroll::find($id);
        $payroll->payment_status = 'Pagado';
        $payroll->save();

        return redirect()->route('nominas.index');
    }
}
