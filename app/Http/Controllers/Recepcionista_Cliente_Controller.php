<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\PeopleData;
use Illuminate\Http\Request;

class Recepcionista_Cliente_Controller extends Controller
{
    // Mostrar la lista de clientes
    public function index(Request $request)
    {
        $query = $request->input('query');
        $clientes = PeopleData::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where('name', 'like', "%{$query}%")
                                 ->orWhere('last_name', 'like', "%{$query}%");
        })->paginate(5);

        return view('clientes_recepcionista', compact('clientes', 'query'));
    }

    // Crear un nuevo cliente
    public function store(Request $request)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'e_mail' => 'required|email|unique:people_data,e_mail', // Cambia aquí según tu tabla
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|max:1',
            'age' => 'required|integer|min:0|max:120',
            'user_id' => 'required|exists:users,id', // Asegúrate de validar el ID del usuario
        ]);

        // Crear nuevo cliente
        $cliente = PeopleData::create($validated);

        return response()->json(['message' => 'Cliente agregado exitosamente.']);
    }
    // Mostrar un cliente específico
    public function show($id)
    {
        $cliente = PeopleData::findOrFail($id);
        return view('detalles_cliente', compact('cliente'));
    }

    // Crear un cliente
    public function create()
    {
        return view('agregar_clienterecepcionista');
    }

    // Actualizar un cliente existente
    public function update(Request $request, $id)
    {
        $this->validateClient($request); // Validar los datos
        $cliente = PeopleData::findOrFail($id); // Buscar cliente
        $cliente->update($request->all()); // Actualizar cliente

        return response()->json($cliente, 200); // Responder con el cliente actualizado
    }

    // Eliminar un cliente
    public function destroy($id)
    {
        $cliente = PeopleData::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $cliente->delete();

        return response()->json(['message' => 'Cliente eliminado con éxito']);
    }

    protected function validateClient(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:15',
            'last_name' => 'required|string|max:20',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:H,M',
            'phone' => 'required|string|size:10',
            'e_mail' => 'required|email|max:50',
            'user_id' => 'nullable|integer|exists:users,id',
        ]);
    }

    public function historial($id)
    {
        $cliente = PeopleData::findOrFail($id);
        $citas = Appointment::where('cliente_id', $id)->get();
        return view('historial_cliente', compact('cliente', 'citas'));
    }
}
