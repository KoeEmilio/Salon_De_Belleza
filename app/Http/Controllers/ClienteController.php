<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        return view('clientes.index'); // Cambia esto por la vista correspondiente
    }

    public function create()
    {
        return view('clientes.create'); // Cambia esto por la vista correspondiente
    }

    public function edit($id)
    {
        return view('clientes.edit', compact('id')); // Cambia esto por la vista correspondiente
    }
}
