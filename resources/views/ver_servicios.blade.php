@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <!-- Encabezado -->
    <div class="text-center mb-4">
        <h1 class="text-pink animate__animated animate__fadeInDown">
            Servicios de 
            @if(isset($client))
            <span class="font-weight-bold">
                {{ $client->first_name ?? 'Cliente no identificado' }} {{ $client->last_name ?? '' }}
            </span>
            @else
            <span class="font-weight-bold">Cliente no identificado</span>
            @endif
        </h1>
        <p class="text-muted">Aquí puedes ver todos los servicios registrados para este cliente.</p>
    </div>

    <!-- Botón para agregar servicio -->
    <div class="text-center mb-4">
        <a href="{{ route('services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Agregar Servicio
        </a>
    </div>

    <!-- Mensajes de sesión -->
    @if(session('success'))
        <div class="alert alert-success">
            <strong>Éxito!</strong> {{ session('success') }}
        </div>
    @endif
    @if(session('info'))
        <div class="alert alert-info">
            <strong>Información:</strong> {{ session('info') }}
        </div>
    @endif

    <!-- Tabla de servicios -->
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped shadow-sm rounded">
            <thead class="bg-dark text-pink">
                <tr>
                    <th>Servicio</th>
                    <th>Precio Base</th>
                    <th>Descripción</th>
                    <th>Tipo de Cabello</th>
                    <th>Precio Adicional</th>
                    <th>Precio Total</th>
                    <th>Duración</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-black text-pink">
                @forelse($client->services as $service)
                    <tr>
                        <td class="align-middle">{{ $service->service_name }}</td>
                        <td class="align-middle">${{ number_format($service->price, 2) }}</td>
                        <td class="align-middle">{{ $service->description ?? 'N/A' }}</td>
                        <td class="align-middle">{{ $service->hair_type ?? 'N/A' }}</td>
                        <td class="align-middle">${{ number_format($service->unit_price, 2) }}</td>
                        <td class="align-middle">${{ number_format($service->price + $service->unit_price, 2) }}</td>
                        <td class="align-middle">{{ $service->duration ?? 'N/A' }} min</td>
                        <td class="align-middle">
                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este servicio?')">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">
                            <i class="fas fa-info-circle"></i> No hay servicios registrados para este cliente.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Botón para regresar -->
    <div class="text-center mt-4">
        <a href="{{ route('citas.index') }}" class="btn btn-outline-secondary mb-4">
            <i class="fas fa-arrow-left"></i> Regresar
        </a>
    </div>
</div>
@endsection
