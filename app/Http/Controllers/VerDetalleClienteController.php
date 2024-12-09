<?php

namespace App\Http\Controllers;

use App\Models\PeopleData; 
use Illuminate\Http\Request;

class VerDetalleClienteController extends Controller
{
    public function show($id)
    {
        $cliente = PeopleData::findOrFail($id);
        return view('detalle_cliente', compact('cliente'));
    }
}