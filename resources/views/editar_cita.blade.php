@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-danger mb-4">Editar Cita</h1>
    <form action="{{ route('recepcionista.citas.update', $appointment->id) }}" method="POST" class="bg-light p-4 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="client_name" class="form-label">Nombre del Cliente:</label>
            <input type="text" name="client_name" id="client_name" class="form-control" value="{{ $appointment->client->name }}" required>
        </div>
        
        <div class="mb-3">
            <label for="last_name" class="form-label">Apellido del Cliente:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $appointment->client->last_name }}" required>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Edad del Cliente:</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $appointment->client->age }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono del Cliente:</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $appointment->client->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="appointment_day" class="form-label">Fecha de Cita:</label>
            <input type="date" name="appointment_day" id="appointment_day" class="form-control" value="{{ $appointment->appointment_day }}" required>
        </div>

        <div class="mb-3">
            <label for="appointment_time" class="form-label">Hora de Cita:</label>
            <input type="time" name="appointment_time" id="appointment_time" class="form-control" value="{{ $appointment->appointment_time }}" required>
        </div>



        <div class="mb-3">
            <label for="status" class="form-label">Estado:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="pendiente" {{ $appointment->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="confirmada" {{ $appointment->status == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                <option value="cancelada" {{ $appointment->status == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="payment_type" class="form-label">Método de Pago:</label>
            <select name="payment_type" id="payment_type" class="form-select" required>
                <option value="efectivo" {{ $appointment->payment_type == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                <option value="transferencia" {{ $appointment->payment_type == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-danger w-100">Actualizar Cita</button>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<style>
    body {
        background-color: #f8f9fa; /* Color de fondo claro */
    }
    .btn-danger {
        background-color: #dc3545; /* Rosa */
        border-color: #dc3545; /* Rosa */
    }
    .form-label {
        color: #343a40; /* Negro */
    }
    .form-control, .form-select {
        border: 2px solid #dc3545; /* Rosa */
    }
    .form-control:focus, .form-select:focus {
        border-color: #dc3545; /* Rosa en foco */
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25); /* Sombra rosa */
    }
</style>
@endsection
