<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\PeopleData;
use App\Models\User; 
use Illuminate\Http\Request;

class Recepcionista_Cliente_Controller extends Controller
{
 
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
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'phone' => 'required|string|max:15',
        'gender' => 'required|string|max:1',
        'age' => 'required|integer|min:0|max:120',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    $cliente = PeopleData::create([
        'name' => $validated['name'],
        'last_name' => $validated['last_name'],
        'age' => $validated['age'],
        'gender' => $validated['gender'],
        'phone' => $validated['phone'],
        'user_id' => $user->id, 
    ]);

    return redirect()->route('clientes.index')->with('message', 'Cliente agregado exitosamente.');
}

    public function show($id)
   {
    $cliente = User::findOrFail($id);
    return view('detalle_cliente', compact('cliente'));
   }

    public function create()
    {
        return view('agregar_clienterecepcionista');
    }

    public function update(Request $request, $id)
    {
        $this->validateClient($request);
        $cliente = PeopleData::findOrFail($id); 
        $cliente->update($request->all()); 

        return response()->json($cliente, 200); 
    }

    
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