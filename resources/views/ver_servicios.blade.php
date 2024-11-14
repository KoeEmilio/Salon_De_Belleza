@extends('layouts.recepcionista')

@section('content')
<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="display-4 fw-bold text-danger"><i class="fas fa-concierge-bell"></i> Servicios de {{ $appointment->client->name }}</h1>
        <p class="text-muted">Administra los servicios relacionados con la cita de manera eficiente.</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h3 class="my-0"><i class="fas fa-calendar-check"></i> Servicios Asignados</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead class="table-light">
                    <tr>
                        <th><i class="fas fa-file-signature"></i> Nombre del Servicio</th>
                        <th><i class="fas fa-align-left"></i> Descripción</th>
                        <th><i class="fas fa-dollar-sign"></i> Precio</th>
                        <th><i class="fas fa-clock"></i> Duración (mins)</th>
                        <th><i class="fas fa-cogs"></i> Tipo de Servicio</th>
                        <th><i class="fas fa-tasks"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>{{ $service->service }}</td>
                            <td>{{ $service->description }}</td>
                            <td>${{ number_format($service->price, 2) }}</td>
                            <td>{{ $service->duration }}</td>
                            <td>{{ $service->typeService->type }}</td>
                            <td>
                                <a href="{{ route('servicios.edit', ['id' => $service->id, 'appointmentId' => $appointment->id]) }}" class="btn btn-sm btn-outline-danger"> 
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('servicios.destroy', $service->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este servicio?');">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay servicios agregados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Botón para agregar nuevo servicio -->
    <div class="text-center mt-5">
        <a href="{{ route('servicios.create', ['appointmentId' => $appointment->id]) }}" class="btn btn-lg btn-danger px-5 py-3 shadow-sm btn-animated">
            <i class="fas fa-plus-circle"></i> Agregar Servicio
        </a>
    </div>

    <!-- Botón para regresar a la gestión de citas -->
    <div class="text-center mt-4">
        <a href="{{ route('recepcionista.citas') }}" class="btn btn-outline-danger btn-animated">
            <i class="fas fa-arrow-left"></i> Regresar a Gestión de Citas
        </a>
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
    .btn-outline-danger {
        color: #dc3545; /* Color texto botón */
        border-color: #dc3545; /* Color borde botón */
    }
    .btn-outline-danger:hover {
        background-color: #dc3545; /* Color fondo al pasar el ratón */
        color: white; /* Color texto al pasar el ratón */
    }
    .table th, .table td {
        vertical-align: middle; /* Alinear verticalmente */
    }
    .card {
        margin-top: 20px; /* Espacio superior para la tarjeta */
    }
    .btn-animated {
        transition: transform 0.2s ease-in-out; /* Efecto de transición para el zoom */
    }
    .btn-animated:hover {
        transform: scale(1.05); /* Zoom al pasar el ratón */
    }
</style>
@endsection
