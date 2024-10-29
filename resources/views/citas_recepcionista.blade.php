@extends('layouts.recepcionista')

@section('content')
<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-danger">Gestión de Citas</h1>
        <p class="text-muted">Administra y organiza las citas de manera eficiente.</p>
    </div>

   
    <div class="mb-4">
        <form action="{{ route('recepcionista.citas') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Buscar por nombre o apellido" value="{{ request()->input('search') }}">
                <button class="btn btn-danger" type="submit">Buscar</button>
            </div>
        </form>
    </div>


   
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h3 class="my-0">Citas Programadas</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover table-striped m-0">
                <thead class="table-light">
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th>Método de Pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_day)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}</td>
                        <td>{{ $appointment->client->name }} {{ $appointment->client->last_name }}</td>
                        <td>
                            @if ($appointment->status == 'confirmada')
                                <span class="badge bg-success">Confirmada</span>
                            @elseif ($appointment->status == 'pendiente')
                                <span class="badge bg-warning text-dark">Pendiente</span>
                            @else
                                <span class="badge bg-danger">Cancelada</span>
                            @endif
                        </td>
                        <td>{{ ucfirst($appointment->payment_type) }}</td>
                        <td>
                            <a href="{{ route('recepcionista.citas.edit', $appointment->id) }}" class="btn btn-sm btn-outline-danger">Editar</a>
                            <a href="{{ route('ver_servicios', ['appointmentId' => $appointment->id]) }}">Ver Servicios</a>
                            <form action="{{ route('recepcionista.citas.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay citas programadas.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $appointments->appends(['search' => $search])->links('pagination::bootstrap-5') }}
    </div>

    <!-- Botón para agregar nueva cita -->
    <div class="text-center mt-5">
        <a href="{{ route('recepcionista.citas.create') }}" class="btn btn-lg btn-danger px-5 py-3 shadow-sm">
            <i class="fas fa-plus-circle"></i> Agregar Nueva Cita
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
</style>
@endsection
