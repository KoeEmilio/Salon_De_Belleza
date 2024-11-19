<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\PeopleData;
use App\Models\User; // Si vas a usar el modelo de usuarios
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

    public function store(Request $request)
{
    // Validación de los datos del cliente
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'phone' => 'required|string|max:15',
        'gender' => 'required|string|max:1',
        'age' => 'required|integer|min:0|max:120',
    ]);

    // Crear el usuario (User)
    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    // Crear el cliente (PeopleData)
    $cliente = PeopleData::create([
        'name' => $validated['name'],
        'last_name' => $validated['last_name'],
        'age' => $validated['age'],
        'gender' => $validated['gender'],
        'phone' => $validated['phone'],
        'user_id' => $user->id,  // Relacionamos el cliente con el usuario
    ]);

    // Redirigir con mensaje de éxito
    return redirect()->route('clientes.index')->with('message', 'Cliente agregado exitosamente.');
}


    // Mostrar un cliente específico
    public function show($id)
{
    $cliente = User::findOrFail($id);
    return view('detalle_cliente', compact('cliente'));
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
            'email' => 'required|email|max:50',
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