<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecepcionistaController extends Controller
{
    public function index() {
        $recepcionista = (object) [
            'nombre' => 'Ana Martínez',
            'fecha_ingreso' => '2023-02-20'
        ];

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

    public function perfil() {
        $recepcionista = (object) [
            'nombre' => 'Ana Martínez',
            'fecha_ingreso' => '2023-02-20'
        ];
    
        return view('perfil_recepcionista', compact('recepcionista'));
    }
    
}

