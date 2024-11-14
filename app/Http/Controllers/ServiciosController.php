<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    /**
     * Muestra la vista de servicios.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)

{
    // Obtener servicios con sus tipos
    $servicios = Service::with('typeService')
        ->when($request->search, function ($query) use ($request) {
            $query->where('service_name', 'like', '%' . $request->search . '%');
        })
        ->paginate(5); // Paginación para mostrar 10 servicios por página

    return view('servicios_recepcionista', compact('servicios'));
}

    // Otras funciones para gestionar servicios (crear, editar, eliminar) pueden ser añadidas aquí

    {
        $query = $request->input('search'); // Obtener el término de búsqueda de la solicitud
        
        // Obtener servicios paginados, 5 por página, filtrando por nombre si se proporciona una consulta
        $servicios = Service::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where('service', 'like', "%{$query}%") // Filtrar por nombre del servicio
                                 ->orWhere('description', 'like', "%{$query}%"); // Opcional: filtrar por descripción
        })->paginate(5);
        
        return view('servicios_recepcionista', compact('servicios', 'query')); // Pasa la variable $servicios y $query a la vista
    }
    public function delete(){
        $servicio = Service::find($id);
        $service->delete();
        return redirect()->route('servicios_admin');
    }
}
