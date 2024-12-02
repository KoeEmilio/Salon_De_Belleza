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
    // Validar que el empleado existe
    $empleado = User::findOrFail($employee_id);
    
    // Obtener la nómina para determinar el periodo
    $nomina = Payroll::where('id', $nomina_id)
                     ->where('employee_id', $employee_id)
                     ->firstOrFail();
    
    // Filtrar bonos e impuestos por el periodo de la nómina (usa la columna date_recorded de bonuses_tax)
    $bonosImpuestos = BonusTax::where('employee_id', $employee_id) // El nombre del modelo sigue siendo BonusTax
                              ->whereBetween('date_recorded', [$nomina->period_start, $nomina->period_end])
                              ->get();
    
    // Retornar la vista con los datos del empleado, bonos/impuestos y nómina
    return view('bonos_impuestos', compact('empleado', 'bonosImpuestos', 'nomina'));
}

    

    public function create($employee_id, $nomina_id)
    {
        // Obtener el empleado
        $empleado = User::findOrFail($employee_id);

        // Obtener la nómina
        $nomina = Payroll::findOrFail($nomina_id);

        return view('agregar_bonustax', compact('empleado', 'nomina'));
    }

    public function store(Request $request, $employee_id, $nomina_id)
    {
        // Validar los datos
        $request->validate([
            'type' => 'required|in:Bono,Impuesto',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date_recorded' => 'required|date',
        ]);

        // Crear el bono/impuesto
        BonusTax::create([
            'employee_id' => $employee_id,
            'type' => $request->type,
            'description' => $request->description,
            'amount' => $request->amount,
            'date_recorded' => $request->date_recorded,
        ]);

        // Redirigir a la vista de bonos e impuestos con mensaje de éxito
        return redirect()->route('bonos.impuestos', ['employee_id' => $employee_id, 'nomina_id' => $nomina_id])
                         ->with('success', 'Bono/Impuesto agregado exitosamente.');
    }
    public function edit($employee_id, $nomina_id, $id)
{
    // Buscar el bono/impuesto
    $bonustax = BonusTax::findOrFail($id);

    // Obtener la nómina asociada para el empleado
    $nomina = Payroll::where('id', $nomina_id)
                     ->where('employee_id', $employee_id)
                     ->firstOrFail();

    // Obtener los detalles del empleado
    $empleado = User::findOrFail($employee_id);

    // Retornar la vista con los datos
    return view('editar_bonustax', compact('bonustax', 'nomina', 'empleado'));
}

    public function update(Request $request, $employee_id, $nomina_id, $id)
    {
        // Validar los datos
        $request->validate([
            'type' => 'required|in:Bono,Impuesto',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date_recorded' => 'required|date',
        ]);
    
        // Encontrar el bono/impuesto
        $bonustax = BonusTax::findOrFail($id);
    
        // Actualizar los datos
        $bonustax->update([
            'type' => $request->type,
            'description' => $request->description,
            'amount' => $request->amount,
            'date_recorded' => $request->date_recorded,
        ]);
    
        // Redirigir con mensaje de éxito
        return redirect()->route('bonos.impuestos', ['employee_id' => $employee_id, 'nomina_id' => $nomina_id])
                         ->with('success', 'Bono/Impuesto actualizado exitosamente.');
    }
 public function destroy($employee_id, $nomina_id, $id)
{
    // Encontrar el bono o impuesto específico
    $bonustax = BonusTax::findOrFail($id);

    // Eliminar el bono o impuesto
    $bonustax->delete();

    // Redirigir a la lista de bonos e impuestos con un mensaje de éxito
    return redirect()->route('bonos.impuestos', ['employee_id' => $employee_id, 'nomina_id' => $nomina_id])
                     ->with('success', 'Bono/Impuesto eliminado exitosamente.');
}
}
