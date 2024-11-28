@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-pink mb-4 animate__animated animate__fadeInDown">Editar Cita</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('citas.index') }}" class="btn btn-outline-secondary mb-4">
        <i class="fas fa-arrow-left"></i> Regresar
    </a>
    
    <form action="{{ route('citas.update', $cita->id) }}" method="POST" class="bg-light p-4 rounded shadow-lg animate__animated animate__fadeInUp">
        @csrf
        @method('PUT')

        <!-- Campo oculto para enviar el owner_id -->
        <input type="hidden" name="owner_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="cita_id" value="{{ $cita->id }}"> <!-- ID de la cita -->

        <div class="mb-3 input-group">
            <span class="input-group-text bg-pink text-white"><i class="fas fa-user"></i></span>
            <input type="text" id="client_name" name="client_name" class="form-control" placeholder="Nombre del Cliente" value="{{ old('client_name', $cita->owner->first_name) }}" required>
        </div>

        <div class="mb-3 input-group">
            <span class="input-group-text bg-pink text-white"><i class="fas fa-user-tag"></i></span>
            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Apellido del Cliente" value="{{ old('last_name', $cita->owner->last_name) }}" required>
        </div>

        <div class="mb-3 input-group">
            <span class="input-group-text bg-pink text-white"><i class="fas fa-calendar-alt"></i></span>
            <input type="date" id="appointment_day" name="appointment_day" class="form-control" value="{{ old('appointment_day', $cita->appointment_day) }}" required>
        </div>

        <div class="mb-3 input-group">
            <span class="input-group-text bg-pink text-white"><i class="fas fa-clock"></i></span>
            <input type="time" id="appointment_time" name="appointment_time" class="form-control" value="{{ old('appointment_time', $cita->appointment_time) }}" required>
        </div>

        <div class="mb-3 input-group">
            <span class="input-group-text bg-pink text-white"><i class="fas fa-tasks"></i></span>
            <select id="status" name="status" class="form-select" required>
                <option value="pendiente" {{ $cita->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="confirmada" {{ $cita->status == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                <option value="cancelada" {{ $cita->status == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>

        <div class="mb-3 input-group">
            <span class="input-group-text bg-pink text-white"><i class="fas fa-money-bill-wave"></i></span>
            <select id="payment_type" name="payment_type" class="form-select" required>
                <option value="efectivo" {{ $cita->payment_type == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                <option value="transferencia" {{ $cita->payment_type == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
            </select>
        </div>

        <button type="submit" class="btn btn-pink w-100 shadow-sm"><i class="fas fa-save me-2"></i>Actualizar Cita</button>
    </form>
</div>

<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');

    body {
        background-color: #f8f9fa;
    }
    .text-pink {
        color: #e91e63;
    }
    .bg-pink {
        background-color: #e91e63;
    }
    .btn-pink {
        background-color: #e91e63;
        border-color: #e91e63;
        color: white;
        font-weight: bold;
    }
    .btn-pink:hover {
        background-color: #d81b60;
    }
    .form-control, .form-select {
        border: 2px solid #e91e63;
        transition: all 0.3s ease;
    }
    .form-control:hover, .form-select:hover {
        box-shadow: 0 0 10px rgba(233, 30, 99, 0.3);
    }
    .form-control:focus, .form-select:focus {
        border-color: #d81b60;
        box-shadow: 0 0 10px rgba(233, 30, 99, 0.3);
    }
    .shadow-lg {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection
