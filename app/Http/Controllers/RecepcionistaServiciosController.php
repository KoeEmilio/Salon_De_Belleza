<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\Service;
use App\Models\HairType;
use App\Models\PeopleData;
use Illuminate\Http\Request;

class RecepcionistaServiciosController extends Controller
{
    public function index(Request $request)
    {
        $clientId = $request->input('client_id') ?? session('clientId');

        if (!$clientId) {
            return redirect()->route('services.index')->with('error', 'Cliente no especificado.');
        }

        $client = PeopleData::find($clientId);

        if (!$client) {
            return redirect()->route('services.index')->with('error', 'Cliente no encontrado.');
        }

        session(['clientId' => $clientId]);

        $services = $client->services;

        return view('ver_servicios', compact('services', 'client'));
    }

    public function create()
    {
        $services = Service::select('id', 'service_name', 'price', 'description', 'duration')->get();
        $hairTypes = HairType::all();
        $clientId = session('clientId');

        return view('agregar_servicio', compact('services', 'hairTypes', 'clientId'));
    }

    public function store(Request $request)
{
    // Validación del formulario
    $request->validate([
        'service_name' => 'required|exists:services,id',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'duration' => 'required|integer|min:1',
        'hair_type' => 'nullable|exists:hair_type,id',
        'unit_price' => 'nullable|numeric|min:0',
        'client_id' => 'required|exists:people_data,id',
    ]);

    try {
        // Obtenemos el servicio base
        $baseService = Service::findOrFail($request->service_id);

        // Creamos un nuevo servicio asociado al cliente
        $service = new Service();
        $service->service_name = $baseService->service_name;  // Nombre del servicio base
        $service->price = $request->price;  // Precio del servicio
        $service->description = $request->description ?? $baseService->description;  // Descripción
        $service->type_of_hair = $request->hair_type;  // Tipo de cabello
        $service->unit_price = $request->unit_price;  // Precio unitario
        $service->duration = $request->duration;  // Duración
        $service->client_id = $request->client_id;  // Cliente asociado

        // Guardamos el servicio
        if ($service->save()) {
            return redirect()->route('services.index', ['client_id' => $request->client_id])
                ->with('success', 'Servicio creado con éxito.');
        } else {
            return redirect()->back()->with('error', 'Hubo un problema al guardar el servicio.');
        }
    } catch (\Exception $e) {
        Log::error('Ocurrió un error al guardar el servicio', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Ocurrió un error al procesar la solicitud.');
    }
}


    
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $hairTypes = HairType::all();

        return view('editar_servicio', compact('service', 'hairTypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'type_of_hair' => 'required|exists:hair_type,id',
            'unit_price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
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

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Servicio eliminado con éxito.');
    }
}
