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
}
