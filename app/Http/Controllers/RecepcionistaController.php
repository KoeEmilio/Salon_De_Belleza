<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RecepcionistaController extends Controller
{
    public function index() {
        // Obtener el recepcionista autenticado
        $recepcionista = Auth::user(); // Asegúrate de que esto devuelva el modelo correcto

        return view('home_recepcionista', compact('recepcionista'));
    }

    public function citas() {
        return view('citas_recepcionista');
    }

    public function clientes() {
        return view('clientes_recepcionista');
    }

    public function servicios() {
        return view('servicios_recepcionista');
    }

   
    
}

