@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-danger mb-4">Agregar Cita</h1>
    <form action="{{ route('recepcionista.citas.store') }}" method="POST" class="bg-light p-4 rounded shadow">
        @csrf
        
        <div class="mb-3">
            <label for="client_name" class="form-label">Nombre del Cliente:</label>
            <input type="text" id="client_name" name="client_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Apellido del Cliente:</label>
            <input type="text" id="last_name" name="last_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Edad del Cliente:</label>
            <input type="number" id="age" name="age" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono del Cliente:</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="appointment_day" class="form-label">Día de la Cita:</label>
            <input type="date" id="appointment_day" name="appointment_day" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="appointment_time" class="form-label">Hora de la Cita:</label>
            <input type="time" id="appointment_time" name="appointment_time" class="form-control" required>
        </div>

        

        <div class="mb-3">
            <label for="status" class="form-label">Estado:</label>
            <select id="status" name="status" class="form-select" required>
                <option value="pendiente">Pendiente</option>
                <option value="confirmada">Confirmada</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="payment_type" class="form-label">Método de Pago:</label>
            <select id="payment_type" name="payment_type" class="form-select" required>
                <option value="efectivo">Efectivo</option>
                <option value="transferencia">Transferencia</option>
            </select>
        </div>

        <button type="submit" class="btn btn-danger w-100">Agregar Cita</button>
    </form>
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
    .form-control {
        border: 2px solid #dc3545; /* Rosa */
    }
    .form-control:focus {
        border-color: #dc3545; /* Rosa en foco */
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25); /* Sombra rosa */
    }
</style>
@endsection
