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
            // Registrar datos recibidos en los logs para depuración
            Log::info('Datos recibidos para la cita:', $request->all());

            // Validar los datos
            $validated = $request->validate([
                'appointment_day' => 'required|date',
                'appointment_time' => 'required|date_format:H:i',
                'owner_id' => 'nullable|exists:people_data,id',
                'payment_type' => 'required|in:efectivo,transferencia',
                'services' => 'nullable|array', // Validar que sea un array
                'services.*' => 'string|max:255', // Validar cada servicio individualmente
            ]);

            // Log de la validación exitosa
            Log::info('Datos validados correctamente.', $validated);

            // Crear la cita
            $appointment = Appointment::create([
                'appointment_day' => $validated['appointment_day'],
                'appointment_time' => $validated['appointment_time'],
                'owner_id' => $validated['owner_id'],
                'payment_type' => $validated['payment_type'],
                'status' => 'pendiente',
            ]);

            // Log de la cita creada
            Log::info('Cita creada con éxito.', ['appointment_id' => $appointment->id]);

            // Opcional: Manejar servicios si es necesario
            if (isset($validated['services'])) {
                // Aquí agregarías la lógica para almacenar los servicios si es necesario
                Log::info('Servicios asociados a la cita:', $validated['services']);
            }

            return response()->json([
                'success' => true,
                'message' => 'Cita agendada correctamente.',
                'data' => $appointment,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Capturamos errores de validación
            Log::error('Error de validación:', [
                'errors' => $e->errors(), // Detalles de los errores de validación
                'request_data' => $request->all(),
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Error de validación.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            // Capturamos cualquier otro tipo de error
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
