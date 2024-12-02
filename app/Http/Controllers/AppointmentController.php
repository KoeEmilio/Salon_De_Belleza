<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Log;

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

            Log::info('Cita creada con éxito.', ['appointment_id' => $appointment->id]);

            if (isset($validated['services'])) {
                Log::info('Servicios asociados a la cita:', $validated['services']);
            }

            // Agregando el mensaje flash
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
                'message' => 'Hubo un error al agendar la cita.',
            ], 500);
        }
    }
}