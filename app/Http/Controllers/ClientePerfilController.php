<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\PeopleData; // Importar el modelo PeopleData

class ClientePerfilController extends Controller
{
    /**
     * Muestra el perfil del cliente.
     */
    public function perfil()
    {
        $cliente = auth()->user();
        return view('cliente_perfil', compact('cliente'));
    }

    /**
     * Muestra el formulario para editar el perfil del cliente.
     */
    public function editarPerfil()
    {
        $cliente = auth()->user();
        return view('cliente_perfil_editar', compact('cliente'));
    }

    /**
     * Muestra las citas del cliente autenticado.
     */
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

    /**
     * Muestra los datos del cliente autenticado.
     */
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
    
            DB::table('appointments')->where('id', $id)->delete();
    
            return redirect()->back()->with('success', 'Cita eliminada correctamente.');
        } catch (\Exception $e) {
            \Log::error("Error al eliminar la cita: {$e->getMessage()}");
            return redirect()->back()->withErrors('Error al eliminar la cita.');
        }
    }
}
