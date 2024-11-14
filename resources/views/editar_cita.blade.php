@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 animate__animated animate__fadeInDown">
        <h1 class="text-center text-pink fw-bold">Editar Cita</h1>
        <a href="{{ route('recepcionista.citas') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Regresar
        </a>
    </div>

    <form action="{{ route('recepcionista.citas.update', $appointment->id) }}" method="POST" class="bg-white p-5 rounded shadow-lg animate__animated animate__fadeInUp animate__delay-1s">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="client_name" class="form-label">Nombre del Cliente:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="client_name" id="client_name" class="form-control" value="{{ $appointment->client->name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label">Apellido del Cliente:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $appointment->client->last_name }}" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="age" class="form-label">Edad:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                    <input type="number" name="age" id="age" class="form-control" value="{{ $appointment->client->age }}" required>
                </div>
            </div>
            <div class="col-md-8">
                <label for="phone" class="form-label">Teléfono:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $appointment->client->phone }}" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="appointment_day" class="form-label">Fecha de Cita:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    <input type="date" name="appointment_day" id="appointment_day" class="form-control" value="{{ $appointment->appointment_day }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="appointment_time" class="form-label">Hora de Cita:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                    <input type="time" name="appointment_time" id="appointment_time" class="form-control" value="{{ $appointment->appointment_time }}" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="status" class="form-label">Estado:</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="pendiente" {{ $appointment->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="confirmada" {{ $appointment->status == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                    <option value="cancelada" {{ $appointment->status == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="payment_type" class="form-label">Método de Pago:</label>
                <select name="payment_type" id="payment_type" class="form-select" required>
                    <option value="efectivo" {{ $appointment->payment_type == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                    <option value="transferencia" {{ $appointment->payment_type == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
                </select>
            </div>
        </div>
        
        <button type="submit" class="btn btn-pink w-100 mt-4">Actualizar Cita</button>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger mt-4">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');

    body {
        background-color: #f0f0f0;
        font-family: 'Roboto', sans-serif;
    }
    .text-pink {
        color: #e91e63;
    }
    .btn-pink {
        background-color: #e91e63;
        border: none;
        color: #fff;
        font-weight: bold;
    }
    .btn-pink:hover {
        background-color: #d81b60;
    }
    .form-label {
        font-weight: 500;
        color: #333;
    }
    .form-control, .form-select {
        border: 2px solid #e91e63;
        transition: all 0.3s ease;
    }
    .form-control:hover, .form-select:hover, .btn-pink:hover {
        box-shadow: 0 0 10px rgba(233, 30, 99, 0.3);
    }
    .form-control:focus, .form-select:focus {
        border-color: #d81b60;
        box-shadow: 0 0 10px rgba(233, 30, 99, 0.3);
    }
    .input-group-text {
        background-color: #e91e63;
        color: #fff;
    }
    .shadow-lg {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection
