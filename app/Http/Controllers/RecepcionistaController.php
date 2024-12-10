<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
   

class RecepcionistaController extends Controller
{
    public function index()
    {
        $recepcionista = Auth::user();
        return view('home_recepcionista', compact('recepcionista'));
    }

  
}