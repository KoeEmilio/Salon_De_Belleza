<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Payroll; 
use App\Models\EmployeeData; 
use App\Models\BonusTax;
use App\Models\User;
use App\Models\EmployeeHour;
use App\Models\PayrollPayment; 


class NominaController extends Controller
{
    public function index($empleado_id)
    {
        $empleado = User::findOrFail($empleado_id);
    
        $period_start = request()->get('period_start');
        $period_end = request()->get('period_end');
        $payment_status = request()->get('payment_status');
    
        $query = Payroll::where('employee_id', $empleado_id);
    
        if ($period_start) {
            $query->where('period_start', '>=', $period_start);
        }
        if ($period_end) {
            $query->where('period_end', '<=', $period_end);
        }
        if ($payment_status) {
            $query->where('payment_status', $payment_status);
        }
    
        $nominas = $query->get();
    
        $totalPagado = PayrollPayment::whereIn('payroll_id', $nominas->pluck('id'))
            ->sum('payment_amount');
    
        $pendientes = Payroll::where('payment_status', 'Pendiente')
            ->where('employee_id', $empleado_id)
            ->count();
    
        return view('nominas', compact('empleado', 'nominas', 'totalPagado', 'pendientes'));
    }
    
    


    public function create($empleado_id)
    {
        $empleado = EmployeeData::findOrFail($empleado_id);
        $empleado = User::findOrFail($empleado_id);
        return view('nominas_create', compact('empleado'));
    }

    public function store(Request $request, $empleado_id)
    {
        $empleado = EmployeeData::findOrFail($empleado_id);
        $request->validate([
            'employee_id' => 'required|exists:payroll,id',
            'period_start' => 'required|date',
            'period_end' => 'required|date',
            'total_hours_worked' => 'required|numeric',
            'overtime_hours' => 'required|numeric',
            'bonuses' => 'required|numeric',
            'tax' => 'required|numeric',
            'net_salary' => 'required|numeric',
            'payment_status' => 'required|in:Pagado,Pendiente',
        ]);

        Payroll::create([
            'employee_id' => $request->employee_id,
            'period_start' => $request->period_start,
            'period_end' => $request->period_end,
            'total_hours_worked' => $request->total_hours_worked,
            'overtime_hours' => $request->overtime_hours,
            'bonuses' => $request->bonuses,
            'tax' => $request->tax,
            'net_salary' => $request->net_salary,
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->route('nominas.index', ['empleado_id' => $empleado->id])->with('success', 'Nómina creada exitosamente.');
    }

    public function edit($empleado_id, $nomina_id)
    {
        $empleado = User::findOrFail($empleado_id);
        $nomina = Payroll::findOrFail($nomina_id);
        return view('nominas_edit', compact('empleado', 'nomina'));
    }

    public function update(Request $request, $empleado_id, $nomina_id)
    {
        $request->validate([
            'period_start' => 'required|date',
            'period_end' => 'required|date',
            'net_salary' => 'required|numeric',
            'payment_status' => 'required|in:Pagado,Pendiente',
            'total_hours_worked' => 'required|numeric',
            'overtime_hours' => 'required|numeric',
            'bonuses' => 'required|numeric',
            'tax' => 'required|numeric',
        ]);
    
        $nomina = Payroll::where('id', $nomina_id)->where('employee_id', $empleado_id)->first();
    
        if (!$nomina) {
            return redirect()->route('nominas.index', ['empleado_id' => $empleado_id])->with('error', 'Nómina no encontrada.');
        }
    
        $nomina->period_start = $request->period_start;
        $nomina->period_end = $request->period_end;
        $nomina->net_salary = $request->net_salary;
        $nomina->payment_status = $request->payment_status;
        $nomina->total_hours_worked = $request->total_hours_worked;
        $nomina->overtime_hours = $request->overtime_hours;
        $nomina->bonuses = $request->bonuses;
        $nomina->tax = $request->tax;
        $nomina->save();
    
        return redirect()->route('nominas.index', ['empleado_id' => $empleado_id])->with('success', 'Nómina actualizada exitosamente.');
    }
    

    public function show($empleado_id, $nomina_id)
    {
        $empleado = User::findOrFail($empleado_id);
        $nomina = Payroll::findOrFail($nomina_id);

        $resumen = [
            'total_pagado' => $nomina->base_salary + $nomina->bonuses - $nomina->tax,
            'pendientes' => Payroll::where('employee_id', $empleado_id)
                                   ->where('payment_status', 'Pendiente')
                                   ->count(),
        ];

        $employeeHours = EmployeeHour::where('employee_id', $empleado_id)
                                      ->whereBetween('date_worked', [$nomina->period_start, $nomina->period_end])
                                      ->get();

        $bonusesAndTaxes = BonusTax::where('employee_id', $empleado_id)
                                   ->whereBetween('date_recorded', [$nomina->period_start, $nomina->period_end])
                                   ->get();

        return view('nominas_show', compact('empleado', 'nomina', 'resumen', 'employeeHours', 'bonusesAndTaxes'));
    }

    public function destroy($empleado_id, $nomina_id)
    {

        $nomina = Payroll::where('id', $nomina_id)->where('employee_id', $empleado_id)->first();

        if (!$nomina) {
            return redirect()->route('nominas.index', ['empleado_id' => $empleado_id])->with('error', 'Nómina no encontrada.');
        }


        $nomina->delete();

        return redirect()->route('nominas.index', ['empleado_id' => $empleado_id])->with('success', 'Nómina eliminada con éxito.');
    }

}
