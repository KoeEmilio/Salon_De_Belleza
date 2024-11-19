@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="display-4 text-center" style="color: #F06292;">Gestión de Servicios</h1>

    <!-- Barra de búsqueda y botón de agregar nueva cita -->
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <form action="{{ route('servicios_recepcionista') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Buscar servicio..." value="{{ request()->get('search') }}">
            <button class="btn btn-pink" type="submit">
                <i class="fas fa-search"></i> Buscar
            </button>
        </form>
    </div>

    <!-- Tabla de servicios -->
    <table class="table table-striped table-hover table-bordered" style="border-color: #F48FB1; border-radius: 10px;">
        <thead class="thead-dark" style="background-color: #F8BBD0; color: white;">
            <tr>
                <th>Nombre del Servicio <i class="fas fa-cogs"></i></th>
                <th>Precio <i class="fas fa-dollar-sign"></i></th>
                <th>Duración <i class="fas fa-clock"></i></th>
                <th>Descripción <i class="fas fa-info-circle"></i></th>
                <th>Tipo <i class="fas fa-tags"></i></th>
                <th>Estado <i class="fas fa-check-circle"></i></th>
            </tr>
        </thead>
        <tbody>
            @forelse($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->service_name }}</td>
                    <td>${{ number_format($servicio->price, 2) }}</td>
                    <td>{{ $servicio->duration }}</td>
                    <td>{{ $servicio->description }}</td>
                    <td>{{ $servicio->typeService->type }}</td> <!-- Acceder al tipo de servicio -->
                    <td>{{ $servicio->estado ? 'Activo' : 'Inactivo' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No se encontraron servicios.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación de Bootstrap -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <!-- Páginas anteriores -->
                @if ($servicios->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Anterior</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $servicios->previousPageUrl() }}" aria-label="Previous">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </a>
                    </li>
                @endif

                <!-- Páginas numeradas -->
                @foreach ($servicios->getUrlRange(1, $servicios->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $servicios->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                <!-- Páginas siguientes -->
                @if ($servicios->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $servicios->nextPageUrl() }}" aria-label="Next">
                            Siguiente <i class="fas fa-arrow-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Siguiente</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F3E5F5; /* Fondo suave rosa */
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            padding: 1rem;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #FDEBEB; /* Rosa suave para filas impares */
        }

        .table-hover tbody tr:hover {
            background-color: #F8D9DA; /* Rosa aún más suave al pasar el ratón */
        }

        .table th {
            background-color: #F8BBD0; /* Rosa suave para el encabezado */
            color: white;
            font-weight: bold;
        }

        .table-bordered {
            border: 2px solid #F48FB1;
        }

        .btn-pink {
            background-color: #F06292;
            color: white;
            border-radius: 5px;
        }

        .pagination .page-item.active .page-link {
            background-color: #F06292;
            border-color: #F06292;
            color: white;
        }

        .pagination .page-link {
            color: #F06292;
        }

        .pagination .page-item.disabled .page-link {
            color: #F06292;
        }
    </style>
@endsection  
