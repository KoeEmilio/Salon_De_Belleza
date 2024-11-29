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
        
            Log::info('Datos recibidos:', $request->all());

            // Validar los datos
            $validated = $request->validate([
                'appointment_day' => 'required|date',
                'appointment_time' => 'required|date_format:H:i',
                'owner_id' => 'nullable|exists:people_data,id',
                'payment_type' => 'required|in:efectivo,transferencia',
                'services' => 'nullable|array', // Validar que sea un array
                'services.*' => 'string|max:255', // Validar cada servicio individualmente
            ]);

            // Crear la cita
            $appointment = Appointment::create([
                'appointment_day' => $validated['appointment_day'],
                'appointment_time' => $validated['appointment_time'],
                'owner_id' => $validated['owner_id'],
                'payment_type' => $validated['payment_type'],
                'status' => 'pendiente',
            ]);

            // Opcional: Manejar servicios si es necesario (esto depende de tu base de datos)
            if (isset($validated['services'])) {
                // Guardar servicios asociados, si existe una tabla relacionada
                // Esto es opcional y requiere definir una relación en tu modelo
            }

            return response()->json([
                'success' => true,
                'message' => 'Cita agendada correctamente.',
                'data' => $appointment,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Capturamos errores de validación
            return response()->json([
                'success' => false,
                'message' => 'Error de validación.',
                'errors' => $e->errors(), // Detalles de los errores de validación
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error al agendar la cita:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al agendar la cita.',
            ], 500);
        }
    }
}
