<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\PeopleData;
use Illuminate\Support\Facades\Log;

class ClientePerfilController extends Controller
{
    
    public function perfil()
    {
        $cliente = auth()->user();
        return view('cliente_perfil', compact('cliente'));
    }

    public function editarPerfil()
    {
        $cliente = auth()->user();
        return view('cliente_perfil_editar', compact('cliente'));
    }


    public function citas()
    {
        $userId = Auth::id();

        $citas = DB::table('appointments')
            ->join('people_data', 'appointments.owner_id', '=', 'people_data.id')
            ->where('people_data.user_id', $userId)
            ->select(
                'appointments.id',
                'appointments.sign_up_date',
                'appointments.appointment_day',
                'appointments.appointment_time',
                'people_data.first_name',
                'appointments.status',
                'appointments.payment_type'
            )
            ->paginate(4);

        return view('CitasCliente', compact('citas'));
    }

  
    public function DatosCliente()
    {
        $cliente = PeopleData::where('user_id', Auth::id())->first();
        return view('PerfilCliente', compact('cliente'));
    }

    /**
     * Elimina una cita específica.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function eliminar($id)
    {
        try {
            $cita = DB::table('appointments')->where('id', $id)->first();
    
            if (!$cita) {
                return redirect()->back()->withErrors('La cita no existe.');
            }
    
            DB::table('appointments')->where('id', $id)->update(['status' => 'Cancelada']);
    
            return redirect()->back()->with('success', 'Cita cancelada correctamente.');
        } catch (\Exception $e) {
            Log::error("Error al cancelar la cita: {$e->getMessage()}");
            return redirect()->back()->withErrors('Error al cancelar la cita.');
        }
    }

    /**
     * 
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancelar($id)
    {
        try {
            $cita = DB::table('appointments')->where('id', $id)->first();
    
            if (!$cita) {
                return response()->json(['error' => 'La cita no existe.'], 400);
            }
    
            DB::table('appointments')->where('id', $id)->update(['status' => 'cancelada']);
    
            return response()->json(['success' => 'Cita cancelada correctamente.']);
        } catch (\Exception $e) {
            Log::error("Error al cancelar la cita: {$e->getMessage()}");
            return response()->json(['error' => 'Error al cancelar la cita.'], 500);
        }
    }
    
}
