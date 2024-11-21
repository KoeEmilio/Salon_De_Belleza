@extends('layouts.recepcionista')

@section('content')
<div class="container my-5">
    <div class="text-center mb-4 animate__animated animate__fadeInDown">
        <h1 class="display-4 fw-bold text-pink">Agregar Servicio</h1>
        <p class="text-muted">Completa el siguiente formulario para agregar un nuevo servicio a la cita.</p>
    </div>

    <div class="card shadow-lg animate__animated animate__fadeInUp animate__delay-1s">
        <div class="card-header bg-pink text-white">
            <h3 class="my-0">Detalles del Servicio</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('servicios.store', $appointmentId) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="service" class="form-label">Nombre del Servicio</label>
                    <input type="text" class="form-control" id="service" name="service" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="price" name="price" required min="0" step="0.01">
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label">Duración (mins)</label>
                    <input type="number" class="form-control" id="duration" name="duration" required min="1">
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label">Tipo de Servicio</label>
                    <select class="form-control" id="type_id" name="type_id" required>
                        <option value="">Selecciona un tipo de servicio</option>
                        @foreach($serviceTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-pink px-5 py-2 shadow-sm">Guardar Servicio</button>
                    <a href="{{ route('ver_servicios', $appointmentId) }}" class="btn btn-secondary px-5 py-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
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
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
        color: white;
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
