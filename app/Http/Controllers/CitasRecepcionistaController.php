<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\PeopleData;
use Illuminate\Http\Request;

class CitasRecepcionistaController extends Controller
{
    
    public function index(Request $request)
{
    // Obtener el valor de búsqueda
    $search = $request->get('search');

    // Obtener las citas con paginación y búsqueda
    $citas = Appointment::with('owner')
        ->when($search, function($query, $search) {
            return $query->where('appointment_day', 'like', "%$search%")
                         ->orWhereHas('owner', function ($query) use ($search) {
                             $query->where('name', 'like', "%$search%");
                         });
        })
        ->paginate(5); // Paginación de 5 elementos por página

    // Pasar las citas a la vista
    return view('citas_recepcionista', compact('citas'));
}

    public function create()
    {
        return view('agregar_cita');
    }

    public function store(Request $request)
    {

        $request->validate([
            'client_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'appointment_day' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'status' => 'required|string',
            'payment_type' => 'required|string',
            'age' => 'nullable|integer',
            'user_id' => 'nullable|exists:users,id',  
        ]);
    

        $client = PeopleData::create([
            'name' => $request->client_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'age' => $request->age ?? null,  
            'user_id' => $request->user_id ?? auth()->id(),  
        ]);
    
        
        $appointment = Appointment::create([
            'owner_id' => $client->id,  
            'appointment_day' => $request->appointment_day,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
            'payment_type' => $request->payment_type,
            'sign_up_date' => now(), 
        ]);
    
        
        return redirect()->route('citas.index')->with('success', 'Cita agregada exitosamente.');
    }
    
    
    

     public function edit($id)
    {
   
        $cita = Appointment::findOrFail($id);
        
        return view('editar_cita', compact('cita'));
    }

    public function update(Request $request, $id)
    {
      
        $request->validate([
            'appointment_day' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'client_name' => 'required|string',
            'status' => 'required|string',
            'payment_type' => 'required|string',
        ]);

    
        $cita = Appointment::findOrFail($id);

       
        $cita->update([
            'appointment_day' => $request->input('appointment_day'),
            'appointment_time' => $request->input('appointment_time'),
            'status' => $request->input('status'),
            'payment_type' => $request->input('payment_type'),
        ]);

       
        return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente');
    }

  
    public function destroy($id)
    {
        $cita = Appointment::findOrFail($id);
        $cita->delete();

        return redirect()->back()->with('success', 'Cita eliminada correctamente.');
    }
} 