<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    /**
     * Muestra la vista de servicios con opción de búsqueda y paginación.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Obtener el término de búsqueda de la solicitud
        $query = $request->input('search'); 

        // Obtener servicios paginados, 5 por página, filtrando por nombre o descripción si se proporciona una consulta
        $servicios = Service::with('typeService') // Incluye la relación con typeService si es necesario
            ->when($query, function($queryBuilder) use ($query) {
                return $queryBuilder->where('service_name', 'like', "%{$query}%") // Filtrar por nombre del servicio
                                    ->orWhere('description', 'like', "%{$query}%"); // Filtrar por descripción del servicio
            })
            ->paginate(5); // Paginación para mostrar 5 servicios por página

        // Retornar la vista con los datos de servicios y la consulta de búsqueda
        return view('servicios_recepcionista', compact('servicios', 'query'));
    }

    /**
     * Elimina un servicio por su ID.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        // Buscar el servicio por ID
        $servicio = Service::find($id);

        // Verificar si el servicio existe
        if ($servicio) {
            $servicio->delete();
            return redirect()->route('servicios_admin')->with('message', 'Servicio eliminado exitosamente.');
        }

        // Si el servicio no se encuentra, redirigir con mensaje de error
        return redirect()->route('servicios_admin')->with('error', 'Servicio no encontrado.');
    }
}
