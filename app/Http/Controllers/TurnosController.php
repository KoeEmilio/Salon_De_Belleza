<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class TurnosController extends Controller
{
    // Mostrar todos los turnos
    public function index()
    {
        $shifts = Shift::all();
        return view('turnos', compact('shifts'));
    }

    // Crear un nuevo turno
    public function create()
    {
        return view('turnos.create');
    }

    public function store(Request $request)
    {
        Shift::create($request->all());
        return redirect()->route('turnos.index');
    }

    // Editar un turno
    public function edit($id)
    {
        $shift = Shift::find($id);
        return view('turnos.edit', compact('shift'));
    }

    // Actualizar un turno
    public function update(Request $request, $id)
    {
        $shift = Shift::find($id);
        $shift->update($request->all());
        return redirect()->route('turnos.index');
    }

    // Eliminar un turno
    public function destroy($id)
    {
        Shift::find($id)->delete();
        return redirect()->route('turnos.index');
    }
}
