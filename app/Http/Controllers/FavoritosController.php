<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritosController extends Controller
{
    public function index()
    {
        return view('agregado'); // Asegúrate de que la vista 'agregado.blade.php' exista en la carpeta resources/views
    }
}
