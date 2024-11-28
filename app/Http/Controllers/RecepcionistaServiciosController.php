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
        // Recupera el client_id de la entrada o la sesión
        $clientId = $request->input('client_id') ?? session('clientId');

        // Verifica si el client_id es válido
        if (!$clientId) {
            return redirect()->route('services.index')->with('error', 'Cliente no especificado.');
        }

        $client = PeopleData::find($clientId);

        // Verifica si el cliente existe
        if (!$client) {
            return redirect()->route('services.index')->with('error', 'Cliente no encontrado.');
        }

        // Almacena el client_id en la sesión
        session(['clientId' => $clientId]);

        // Recupera los servicios del cliente (paginados si es necesario)
        $services = $client->services()->paginate(10);

        return view('ver_servicios', compact('services', 'client'));
    }

    public function create()
    {
        // Obtiene todos los servicios y tipos de cabello
        $services = Service::select('id', 'service_name', 'price', 'description', 'duration')->get();
        $hairTypes = HairType::all();
        $clientId = session('clientId');

        return view('agregar_servicio', compact('services', 'hairTypes', 'clientId'));
    }

    public function store(Request $request)
    {
        // Validación de los datos recibidos
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
            // Obtenemos el servicio base desde la base de datos
            $baseService = Service::findOrFail($request->service_id);

            // Creamos un nuevo servicio para el cliente
            $service = new Service();
            $service->service_name = $baseService->service_name;  // Nombre del servicio base
            $service->price = $request->price;  // Precio del servicio
            $service->description = $request->description ?? $baseService->description;  // Descripción
            $service->type_of_hair = $request->hair_type;  // Tipo de cabello
            $service->unit_price = $request->unit_price;  // Precio unitario
            $service->duration = $request->duration;  // Duración
            $service->client_id = $request->client_id;  // Cliente asociado

            // Guardamos el servicio en la base de datos
            if ($service->save()) {
                return redirect()->route('services.index', ['client_id' => $request->client_id])
                    ->with('success', 'Servicio creado con éxito.');
            } else {
                return redirect()->back()->with('error', 'Hubo un problema al guardar el servicio.');
            }
        } catch (\Exception $e) {
            // Manejo de errores en caso de fallos
            Log::error('Ocurrió un error al guardar el servicio', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Ocurrió un error al procesar la solicitud. Por favor, intente nuevamente.');
        }
    }

    public function edit($id)
    {
        // Obtiene el servicio por su ID y los tipos de cabello
        $service = Service::findOrFail($id);
        $hairTypes = HairType::all();

        return view('editar_servicio', compact('service', 'hairTypes'));
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos de entrada
        $request->validate([
            'service_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'type_of_hair' => 'required|exists:hair_types,id',
            'unit_price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        try {
            // Actualiza el servicio con los datos proporcionados
            $service = Service::findOrFail($id);
            $service->service_name = $request->service_name;
            $service->price = $request->price;
            $service->description = $request->description;
            $service->type_of_hair = $request->type_of_hair;
            $service->unit_price = $request->unit_price;
            $service->duration = $request->duration;
            $service->save();

            return redirect()->route('services.index')->with('success', 'Servicio actualizado con éxito.');
        } catch (\Exception $e) {
            // Manejo de errores en caso de fallos
            Log::error('Ocurrió un error al actualizar el servicio', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Ocurrió un error al procesar la solicitud. Por favor, intente nuevamente.');
        }
    }

    public function destroy($id)
    {
        try {
            // Encuentra el servicio por su ID y lo elimina
            $service = Service::findOrFail($id);
            $service->delete();

            return redirect()->route('services.index')->with('success', 'Servicio eliminado con éxito.');
        } catch (\Exception $e) {
            // Manejo de errores al intentar eliminar el servicio
            Log::error('Error al eliminar el servicio', ['error' => $e->getMessage()]);
            return redirect()->route('services.index')->with('error', 'Ocurrió un error al eliminar el servicio.');
        }
    }
}
