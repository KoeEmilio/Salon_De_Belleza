<?php
namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\HairType;
use App\Models\PeopleData;
use Illuminate\Http\Request;

class RecepcionistaServiciosController extends Controller
{
    // Mostrar los servicios agregados
    public function index(Request $request)
{
    $clientId = $request->input('client_id');
    
    // Si client_id no está en la URL, buscarlo en la sesión
    if (!$clientId) {
        $clientId = session('clientId');
    }

    $client = PeopleData::find($clientId);

    if (!$client) {
        return redirect()->route('services.index')->with('error', 'Cliente no encontrado.');
    }

    $services = $client->services; // Obtener los servicios relacionados con el cliente
    return view('ver_servicios', compact('services', 'client'));
}

    
    public function create()
    {
        $services = Service::all(); // Obtener todos los servicios
        $hairTypes = HairType::all(); // Obtener todos los tipos de cabello
        $clientId = session('clientId'); // Obtener clientId de la sesión
        
        return view('agregar_servicio', compact('services', 'hairTypes', 'clientId'));
    }
    
    // Guardar un nuevo servicio
    public function store(Request $request)
{
    $request->validate([
        'service_name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'type_of_hair' => 'nullable|string',
        'unit_price' => 'required|numeric',
        'duration' => 'required|integer',
        'client_id' => 'required|exists:people_data,id', // Validación de client_id
    ]);

    $service = new Service();
    $service->service_name = $request->service_name;
    $service->price = $request->price;
    $service->description = $request->description;
    $service->type_of_hair = $request->type_of_hair;
    $service->unit_price = $request->unit_price;
    $service->duration = $request->duration;
    $service->client_id = $request->client_id; // Guardamos el client_id
    $service->save();

    // Redirigir de nuevo a la vista de servicios, incluyendo el client_id en la URL
    return redirect()->route('services.index', ['client_id' => $request->client_id])
        ->with('success', 'Servicio creado con éxito.');
}


    // Mostrar el formulario para editar un servicio
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $hairTypes = HairType::all(); // Si quieres mostrar los tipos de pelo para edición
        return view('editar_servicio', compact('service', 'hairTypes'));
    }

    // Actualizar los detalles de un servicio
    public function update(Request $request, $id)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'type_of_hair' => 'nullable|string',
            'unit_price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        $service = Service::findOrFail($id);
        $service->service_name = $request->service_name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->type_of_hair = $request->type_of_hair;
        $service->unit_price = $request->unit_price;
        $service->duration = $request->duration;
        $service->save();

        return redirect()->route('services.index')->with('success', 'Servicio actualizado con éxito.');
    }

    // Eliminar un servicio
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Servicio eliminado con éxito.');
    }
}
