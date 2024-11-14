<?php

namespace App\Http\Controllers;

use App\Models\PeopleData; // Asegúrate de que el modelo está importado
use Illuminate\Http\Request;

class VerDetalleClienteController extends Controller
{
    public function show($id)
    {
        // Busca al cliente por su ID
        $cliente = PeopleData::findOrFail($id);

        // Devuelve la vista con los datos del cliente
        return view('detalle_cliente', compact('cliente'));
    }
}