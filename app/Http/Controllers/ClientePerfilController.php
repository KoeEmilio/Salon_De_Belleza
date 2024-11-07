<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientePerfilController extends Controller
{
    /**
     * Muestra el perfil del cliente.
     */
    public function perfil()
    {
        $cliente = auth()->user();
        return view('cliente_perfil', compact('cliente'));
    }

    /**
     * Muestra el formulario para editar el perfil del cliente.
     */
    public function editarPerfil()
    {
        $cliente = auth()->user();
        return view('cliente_perfil_editar', compact('cliente'));
    }

    
   
}
