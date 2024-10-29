@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="display-4 text-center" style="color: #D5006D;">Gestión de Servicios</h1>
    <p class="text-center" style="color: #666;">Aquí podrás ver y gestionar los servicios ofrecidos.</p>

    <!-- Barra de búsqueda -->
    <form method="GET" action="{{ route('servicios_recepcionista') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar servicio..." aria-label="Buscar servicio" value="{{ request()->query('search') }}" style="border: 2px solid #D5006D;">
            <button class="btn" type="submit" style="background-color: #D5006D; color: white;">Buscar</button>
        </div>
    </form>

    <!-- Tabla de servicios -->
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark" style="background-color: #000; color: white;">
            <tr>
                <th>Nombre del Servicio</th>
                <th>Precio</th>
                <th>Duración</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->service }}</td>
                    <td>${{ number_format($servicio->price, 2) }}</td>
                    <td>{{ $servicio->duration }}</td>
                    <td>{{ $servicio->description }}</td>
                    <td>{{ $servicio->type_service }}</td>
                    <td>{{ $servicio->estado ? 'Activo' : 'Inactivo' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No se encontraron servicios.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $servicios->links('pagination::bootstrap-5') }}
    </div>
</div>

<style>
    body {
        font-family: 'Roboto', sans-serif; /* Cambia a otra fuente si prefieres */
        background-color: #f8f9fa; /* Color de fondo claro para el cuerpo */
    }

    .table th, .table td {
        text-align: center; /* Centrar el texto en las celdas */
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #ffeef8; /* Color rosa claro para filas impares */
    }

    .table-hover tbody tr:hover {
        background-color: #f1c7d4; /* Color rosa más claro al pasar el ratón */
    }
</style>

@endsection
