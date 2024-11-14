@extends('layouts.recepcionista')

@section('content')
<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="display-4 fw-bold text-danger"><i class="fas fa-pencil-alt"></i> Editar Servicio</h1>
        <p class="text-muted">Actualiza los detalles del servicio a continuación.</p>
    </div> 

    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h3 class="my-0">Detalles del Servicio</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('servicios.update', ['id' => $service->id, 'appointmentId' => $appointmentId]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="service" class="form-label">Nombre del Servicio</label>
                    <input type="text" class="form-control" id="service" name="service" value="{{ $service->service }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $service->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $service->price }}" required min="0" step="0.01">
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label">Duración (mins)</label>
                    <input type="number" class="form-control" id="duration" name="duration" value="{{ $service->duration }}" required min="1">
                </div>
                
                <div class="mb-3">
                    <label for="type_id" class="form-label">Tipo de Servicio</label>
                    <select class="form-control" id="type_id" name="type_id" required>
                        <option value="">Selecciona un tipo de servicio</option>
                        @foreach($serviceTypes as $type)
                            <option value="{{ $type->id }}" {{ $type->id == $service->type_id ? 'selected' : '' }}>{{ $type->type }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Incluir appointmentId en un campo oculto -->
                <input type="hidden" name="appointmentId" value="{{ $appointmentId }}">

                <div class="text-center">
                    <button type="submit" class="btn btn-danger px-5 py-2 shadow-sm btn-animated"> 
                        <i class="fas fa-save"></i> Actualizar Servicio
                    </button>
                    <a href="{{ route('ver_servicios', ['appointmentId' => $appointmentId]) }}" class="btn btn-secondary px-5 py-2 btn-animated">
                        <i class="fas fa-times-circle"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f8f9fa; /* Color de fondo claro */
    }
    .btn-danger {
        background-color: #dc3545; /* Color principal */
        border-color: #dc3545; /* Color principal */
    }
    .btn-secondary {
        background-color: #6c757d; /* Color para el botón secundario */
        border-color: #6c757d; /* Color borde botón secundario */
    }
    .btn-secondary:hover {
        background-color: #5a6268; /* Color fondo al pasar el ratón */
        color: white; /* Color texto al pasar el ratón */
    }
    .card {
        margin-top: 20px; /* Espacio superior para la tarjeta */
        border-radius: 8px; /* Bordes redondeados en la tarjeta */
    }
    .card-header {
        background-color: #dc3545; /* Color de fondo del encabezado */
        color: white; /* Color de texto del encabezado */
        border-top-left-radius: 8px; /* Bordes redondeados en la parte superior */
        border-top-right-radius: 8px; /* Bordes redondeados en la parte superior */
    }
    .form-control {
        border-radius: 8px; /* Bordes redondeados en los campos de formulario */
    }
    .btn {
        border-radius: 8px; /* Bordes redondeados en los botones */
    }
    .btn-animated {
        transition: transform 0.2s ease-in-out; /* Efecto de transición para el zoom */
    }
    .btn-animated:hover {
        transform: scale(1.05); /* Zoom al pasar el ratón */
    }
</style>
@endsection
