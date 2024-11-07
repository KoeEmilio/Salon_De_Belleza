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
        $query = $request->input('search'); // Obtener el término de búsqueda de la solicitud
        
        // Obtener servicios paginados, 5 por página, filtrando por nombre si se proporciona una consulta
        $servicios = Service::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where('service', 'like', "%{$query}%") // Filtrar por nombre del servicio
                                 ->orWhere('description', 'like', "%{$query}%"); // Opcional: filtrar por descripción
        })->paginate(5);
        
        return view('servicios_recepcionista', compact('servicios', 'query')); // Pasa la variable $servicios y $query a la vista
    }
    // Otras funciones para gestionar servicios (crear, editar, eliminar) pueden ser añadidas aquí
}
