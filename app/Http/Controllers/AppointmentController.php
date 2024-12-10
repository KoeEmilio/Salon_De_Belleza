<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Log;
use App\Mail\ConfirmacionCita;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        try {
            Log::info('Datos recibidos para la cita:', $request->all());

            $validated = $request->validate([
                'appointment_day' => 'required|date',
                'appointment_time' => 'required|date_format:H:i',
                'owner_id' => 'nullable|exists:people_data,id',
                'payment_type' => 'required|in:efectivo,transferencia',
                'services' => 'nullable|array',
                'services.*' => 'string|max:255',
            ]);

            Log::info('Datos validados correctamente.', $validated);

            $appointment = Appointment::create([
                'appointment_day' => $validated['appointment_day'],
                'appointment_time' => $validated['appointment_time'],
                'owner_id' => $validated['owner_id'],
                'payment_type' => $validated['payment_type'],
                'status' => 'pendiente',
            ]);

            $usuario = Auth::user();

            if ($usuario) {
                Mail::to($usuario->email)->send(
                    new ConfirmacionCita($appointment, $validated['services'] ?? [])
                );
                Log::info('Correo enviado al usuario logueado:', ['email' => $usuario->email]);
            } else {
                Log::warning('No se encontró un usuario autenticado para enviar el correo.');
            }

            session()->flash('success', '¡La confirmación se ha enviado al correo!');

            Log::info('Cita creada con éxito.', ['appointment_id' => $appointment->id]);

            if (isset($validated['services'])) {
                Log::info('Servicios asociados a la cita:', $validated['services']);
            }

            session()->flash('success', '¡La confirmación se ha enviado al correo!');

            return response()->json([
                'success' => true,
                'message' => 'Cita agendada correctamente.',
                'data' => $appointment,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Error de validación:', [
                'errors' => $e->errors(),
                'request_data' => $request->all(),
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Error de validación.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error inesperado al agendar la cita:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Hora ya usada, por favor elige otra.',
            ], 500);
        }
    }

    public function getAgendadasHoras(Request $request)
    {
        $fecha = $request->input('fecha');
        $horasAgendadas = Appointment::whereDate('appointment_day', $fecha)
            ->where('status', '!=', 'cancelada')
            ->pluck('appointment_time')
            ->toArray();

        return response()->json($horasAgendadas);
    }
}