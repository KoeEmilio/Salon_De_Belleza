@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4" style="color: #00000;">Editar Cita</h2>

    <form action="{{ route('appointment.update', $cita->id) }}" method="POST" class="p-4 shadow-sm rounded" style="background-color: #fff;">
        @csrf
        @method('PUT') 

        <!-- Nombre -->
        <div class="mb-3">
            <label for="name" class="form-label" style="color: #00000;">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" style="border: 1px solid #fe889f;" value="{{ $cita->owner->first_name }}" required>
        </div>

        <!-- Apellido -->
        <div class="mb-3">
            <label for="last_name" class="form-label" style="color: #00000;">Apellido</label>
            <input type="text" name="last_name" id="last_name" class="form-control" style="border: 1px solid #fe889f;" value="{{ $cita->owner->last_name }}" required>
        </div>

        <!-- Edad -->
        <div class="mb-3">
            <label for="age" class="form-label" style="color: #00000;">Edad</label>
            <input type="number" name="age" id="age" class="form-control" style="border: 1px solid #fe889f;" value="{{ $cita->owner->age }}" required>
        </div>

        <!-- Género -->
        <div class="mb-3">
            <label for="gender" class="form-label" style="color: #00000;">Género</label>
            <select name="gender" id="gender" class="form-select" style="border: 1px solid #fe889f;" required>
                <option value="H" {{ $cita->owner->gender == 'H' ? 'selected' : '' }}>Hombre</option>
                <option value="M" {{ $cita->owner->gender == 'M' ? 'selected' : '' }}>Mujer</option>
            </select>
        </div>

        <!-- Teléfono -->
        <div class="mb-3">
            <label for="phone" class="form-label" style="color: #00000;">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control" style="border: 1px solid #fe889f;" value="{{ $cita->owner->phone }}" required>
        </div>

        <!-- Fecha de Cita -->
        <div class="mb-3">
            <label for="appointment_day" class="form-label" style="color: #fe889f;">Fecha de Cita</label>
            <input type="date" name="appointment_day" id="appointment_day" class="form-control" style="border: 1px solid #fe889f;" value="{{ $cita->appointment_day }}" required>
        </div>

        <!-- Hora de la Cita -->
        <div class="mb-3">
            <label for="appointment_time" class="form-label" style="color: #00000;">Hora de la Cita</label>
            <input type="time" name="appointment_time" id="appointment_time" class="form-control" style="border: 1px solid #fe889f;" value="{{ $cita->appointment_time }}" required>
        </div>
      
        <!-- Estado -->
        <div class="mb-3">
            <label for="status" class="form-label" style="color: #00000;">Estado</label>
            <select name="status" id="status" class="form-select" style="border: 1px solid #fe889f;" required>
                <option value="pendiente" {{ $cita->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="confirmada" {{ $cita->status == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                <option value="cancelada" {{ $cita->status == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>

        <!-- Tipo de Pago -->
        <div class="mb-3">
            <label for="payment_type" class="form-label" style="color: #00000;">Tipo de Pago</label>
            <select name="payment_type" id="payment_type" class="form-select" style="border: 1px solid #fe889f;" required>
                <option value="efectivo" {{ $cita->payment_type == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                <option value="transferencia" {{ $cita->payment_type == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
            </select>
        </div>

        <!-- Botón Actualizar -->
        <div class="text-center">
            <button type="submit" class="btn" style="background-color: #fe889f; color: #fff; border-radius: 20px; padding: 10px 20px;">Actualizar Cita</button>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('appointment.index') }}" class="btn">
                Regresar
            </a>
        </div>
    </form>
</div>

<!-- Estilo personalizado -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #fff0f5;
    }

    .form-control:focus, .form-select:focus {
        border-color: #ffb7c2;
        box-shadow: 0 0 5px rgba(255, 183, 194, 0.5);
    }

    form {
        max-width: 600px;
        margin: 0 auto;
    }
</style>
@endsection
