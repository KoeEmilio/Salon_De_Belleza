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
    
        // Obtener clientes paginados, 5 por página, filtrando por nombre si se proporciona una consulta
        $clientes = PeopleData::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where('name', 'like', "%{$query}%")
                                 ->orWhere('last_name', 'like', "%{$query}%");
        })->paginate(5);
    
        return view('clientes_recepcionista', compact('clientes', 'query')); // Pasa la variable $clientes y $query a la vista
    }

    // Crear un nuevo cliente
    public function store(Request $request)
{
    // Validar y crear el cliente
    $cliente = new PeopleData();
    $cliente->name = $request->input('name');
    $cliente->last_name = $request->input('last_name');
    $cliente->phone = $request->input('phone');
    // Agregar otros campos según sea necesario
    $cliente->save();

    return response()->json(['message' => 'Cliente registrado exitosamente.']);
}


    // Mostrar un cliente específico
    public function show($id)
{
    $cliente = PeopleData::findOrFail($id);
    return view('detalles_cliente', compact('cliente'));
}
    public function create()
{
    return view('registrar_cliente');
}

    // Actualizar un cliente existente
    public function update(Request $request, $id)
{
    $this->validateClient($request); // Usa la misma validación
    $cliente = PeopleData::create($request->all());
    return response()->json($cliente, 201);
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
    $citas = Appointment::where('cliente_id', $id)->get(); // Asegúrate de tener el modelo Cita
    return view('historial_cliente', compact('cliente', 'citas'));
}
} 
