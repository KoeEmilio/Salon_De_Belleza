<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Appointment; // Modelo Appointment
use App\Models\PeopleData;  // Modelo PeopleData
use App\Models\Service;     // Modelo Service

class RecepcionistaController extends Controller
{
    public function index()
    {
        $recepcionista = Auth::user();
        return view('home_recepcionista', compact('recepcionista'));
    }

  
}