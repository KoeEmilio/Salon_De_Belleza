<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiciosController extends Controller
{
  
    public function index(Request $request)
    {
        $query = $request->input('search'); 

        $servicios = Service::with('typeService') 
            ->when($query, function($queryBuilder) use ($query) {
                return $queryBuilder->where('service_name', 'like', "%{$query}%") 
                                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->paginate(5); 
        return view('servicios_recepcionista', compact('servicios', 'query'));
    }

    public function delete($id)
    {
        $servicio = Service::find($id);

        if ($servicio) {
            $servicio->delete();
            return redirect()->route('servicios_admin')->with('message', 'Servicio eliminado exitosamente.');
        }

        return redirect()->route('servicios_admin')->with('error', 'Servicio no encontrado.');
    }

    public function addservice(){
        return view('AddServiceAdmin');
    }

    public function registerServiceAndType(Request $request)
{
    $validatedData = $request->validate([
        'service_name' => 'required|string|max:30',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'duration' => 'required|date_format:H:i:s',
        'type' => 'required|string|max:30'
    ]);

    DB::statement('CALL RegisterServiceAndType(?, ?, ?, ?, ?)', [
        $validatedData['service_name'],
        $validatedData['price'],
        $validatedData['description'],
        $validatedData['duration'],
        $validatedData['type']
    ]);

    return redirect()->route('servicios_admin')->with('success', 'Servicio registrado con éxito');
}

}
