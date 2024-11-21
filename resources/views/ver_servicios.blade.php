@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="text-pink animate__animated animate__fadeInDown">
            Servicios de 
            @if(isset($client))
                <span class="font-weight-bold">{{ $client->first_name }} {{ $client->last_name }}</span>
            @else
                <span class="font-weight-bold">Cliente no identificado</span>
            @endif
        </h1>
        <p class="text-muted">Aquí puedes ver todos los servicios registrados para este cliente.</p>
    </div>

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

    <!-- Botón para agregar servicio -->
    <div class="text-center mt-4">
        <a href="{{ route('services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Agregar Servicio
        </a>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped shadow-sm rounded">
            <thead class="bg-pink text-white">
                <tr>
                    <th>Servicio</th>
                    <th>Precio del Servicio</th> 
                    <th>Descripción</th>
                    <th>Tipo de Pelo</th> 
                    <th>Precio por Tipo de Pelo</th>
                    <th>Duración</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td class="align-middle">{{ $service['service_name'] }}</td>
                        <td class="align-middle">${{ number_format($service['price'], 2) }}</td>
                        <td class="align-middle">{{ $service['description'] ?? 'N/A' }}</td>
                        <td class="align-middle">{{ $service['type_of_hair'] ?? 'N/A' }}</td>
                        <td class="align-middle">${{ number_format($service['unit_price'], 2) }}</td>                     
                        <td class="align-middle">{{ $service['duration'] ?? 'N/A' }} min</td>
                        <td class="align-middle">
                            <a href="{{ route('services.edit', $loop->index) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            <i class="fas fa-info-circle"></i> No hay servicios registrados para este cliente.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('citas.index') }}" class="btn btn-outline-secondary mb-4">
            <i class="fas fa-arrow-left"></i> Regresar
        </a>
    </div>
</div>

<style scoped>
    h1 {
        font-size: 2.5rem;
        font-family: 'Arial', sans-serif;
        color: #d81b60;
        font-weight: bold;
    }

    p.text-muted {
        font-size: 1.2rem;
        color: #757575;
    }

    table {
        width: 100%;
        margin-top: 20px;
        border-radius: 8px;
    }

    th {
        background-color: #f48fb1;
        color: #fff;
        font-size: 1.1rem;
        padding: 12px;
        text-align: center;
    }

    td {
        font-size: 1rem;
        color: #333;
        padding: 10px;
        text-align: center;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .btn-info {
        background-color: #2196F3;
        color: white;
        border-radius: 5px;
    }

    .btn-warning {
        background-color: #FF9800;
        color: white;
        border-radius: 5px;
    }

    .btn-danger {
        background-color: #f44336;
        color: white;
        border-radius: 5px;
    }

    .btn-outline-secondary {
        border-color: #ccc;
        color: #555;
        padding: 10px 30px;
        font-size: 1rem;
        border-radius: 5px;
    }

    table {
        animation: fadeIn 1s ease-in-out;
    }

    h1 {
        animation: fadeInDown 1s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes fadeInDown {
        from { transform: translateY(-50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
</style>

@endsection
