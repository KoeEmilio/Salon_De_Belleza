@extends('layouts.recepcionista')

@section('content')
<div class="container my-5">
    <div class="text-center mb-4">
       
        <h1 class="display-4 fw-bold text-danger">Servicios de {{ $appointment->client->name }}</h1>
        <p class="text-muted">Administra los servicios relacionados con la cita de manera eficiente.</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h3 class="my-0">Servicios Asignados</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Nombre del Servicio</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Duración (mins)</th>
                        <th>Tipo de Servicio</th>
                        <th>Acciones</th>
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
                                <a href="{{ route('servicios.edit', ['id' => $service->id, 'appointmentId' => $appointment->id]) }}" class="btn btn-sm btn-outline-danger">Editar</a>
                                <form action="{{ route('servicios.destroy', $service->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este servicio?');">Eliminar</button>
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

    <div class="text-center mt-5">
        <a href="{{ route('servicios.create', ['appointmentId' => $appointment->id]) }}" class="btn btn-lg btn-danger px-5 py-3 shadow-sm">
            <i class="fas fa-plus-circle"></i> Agregar Servicio
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
</style>
@endsection
