<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BonusTax;
use App\Models\User;
use App\Models\Payroll;

class BonosImpuestosController extends Controller
{
    public function index($employee_id, $nomina_id)
{
    $empleado = User::findOrFail($employee_id);
    
    $nomina = Payroll::where('id', $nomina_id)
                     ->where('employee_id', $employee_id)
                     ->firstOrFail();
    
    $bonosImpuestos = BonusTax::where('employee_id', $employee_id) 
                              ->whereBetween('date_recorded', [$nomina->period_start, $nomina->period_end])
                              ->get();
    
    return view('bonos_impuestos', compact('empleado', 'bonosImpuestos', 'nomina'));
}

    

    public function create($employee_id, $nomina_id)
    {
        $empleado = User::findOrFail($employee_id);

        $nomina = Payroll::findOrFail($nomina_id);

        return view('agregar_bonustax', compact('empleado', 'nomina'));
    }

    public function store(Request $request, $employee_id, $nomina_id)
    {
        $request->validate([
            'type' => 'required|in:Bono,Impuesto',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date_recorded' => 'required|date',
        ]);

        BonusTax::create([
            'employee_id' => $employee_id,
            'type' => $request->type,
            'description' => $request->description,
            'amount' => $request->amount,
            'date_recorded' => $request->date_recorded,
        ]);

        return redirect()->route('bonos.impuestos', ['employee_id' => $employee_id, 'nomina_id' => $nomina_id])
                         ->with('success', 'Bono/Impuesto agregado exitosamente.');
    }
    public function edit($employee_id, $nomina_id, $id)
{
    $bonustax = BonusTax::findOrFail($id);

    $nomina = Payroll::where('id', $nomina_id)
                     ->where('employee_id', $employee_id)
                     ->firstOrFail();

    $empleado = User::findOrFail($employee_id);

    return view('editar_bonustax', compact('bonustax', 'nomina', 'empleado'));
}

    public function update(Request $request, $employee_id, $nomina_id, $id)
    {
        $request->validate([
            'type' => 'required|in:Bono,Impuesto',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date_recorded' => 'required|date',
        ]);
    
        $bonustax = BonusTax::findOrFail($id);
    
        $bonustax->update([
            'type' => $request->type,
            'description' => $request->description,
            'amount' => $request->amount,
            'date_recorded' => $request->date_recorded,
        ]);
    
        return redirect()->route('bonos.impuestos', ['employee_id' => $employee_id, 'nomina_id' => $nomina_id])
                         ->with('success', 'Bono/Impuesto actualizado exitosamente.');
    }
 public function destroy($employee_id, $nomina_id, $id)
{
    $bonustax = BonusTax::findOrFail($id);

    $bonustax->delete();

    return redirect()->route('bonos.impuestos', ['employee_id' => $employee_id, 'nomina_id' => $nomina_id])
                     ->with('success', 'Bono/Impuesto eliminado exitosamente.');
}
}
