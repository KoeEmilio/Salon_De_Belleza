@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4" style="color: #F06292;">Lista de Clientes</h1>

    <!-- Barra de búsqueda -->
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <div class="d-flex">
            <!-- Formulario de búsqueda -->
            <form action="{{ route('clientes.index') }}" method="GET" class="d-flex">
                <input type="text" name="query" class="form-control me-2" placeholder="Buscar por nombre" value="{{ request()->input('query') }}" style="border: 2px solid #F06292;">
                <button class="btn btn-outline-secondary" type="submit" style="background-color: #F06292; color: white;">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-light" style="background-color: #F8BBD0; color: #fff;">
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Número de Contacto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->name }} {{ $cliente->last_name }}</td>
                    <td>{{ $cliente->age }}</td>
                    <td>{{ $cliente->phone }}</td>
                    <td>
                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info">
                            <i class="fas fa-eye"></i> Ver Detalles
                        </a>
                        <a href="{{ route('clientes.historial_citas', $cliente->id) }}" class="btn btn-warning">
                            <i class="fas fa-calendar-alt"></i> Historial de Citas
                        </a>                    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación de Bootstrap -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <!-- Páginas anteriores -->
                @if ($clientes->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Anterior</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $clientes->previousPageUrl() }}" aria-label="Previous">Anterior</a>
                    </li>
                @endif

                <!-- Páginas numeradas -->
                @foreach ($clientes->getUrlRange(1, $clientes->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $clientes->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                <!-- Páginas siguientes -->
                @if ($clientes->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $clientes->nextPageUrl() }}" aria-label="Next">Siguiente</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Siguiente</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
@endsection  

<style>
    /* Fondo de la página */
    body {
        background-color: #FCE4EC; /* Rosa claro */
        font-family: 'Roboto', sans-serif;
    }

    h1 {
        font-size: 2.5rem;
        font-weight: 600;
        color: #F06292; /* Rosa más intenso */
    }

    .table {
        background-color: #fff;
        border-radius: 10px;
    }

    .table th, .table td {
        padding: 15px;
        text-align: center;
        font-size: 1.1rem;
    }

    .table-light {
        background-color: #F8BBD0; /* Rosa claro para encabezado */
    }

    .pagination .page-item.active .page-link {
        background-color: #F06292;
        border-color: #F06292;
    }

    .pagination .page-link {
        color: #F06292;
    }

    .btn-info {
        background-color: #0288D1;
        color: white;
    }

    .btn-info:hover {
        background-color: #0277BD;
    }

    .btn-warning {
        background-color: #FFB74D;
        color: white;
    }

    .btn-warning:hover {
        background-color: #FF9800;
    }

    .btn i {
        margin-right: 5px;
    }

    .page-item.disabled .page-link {
        background-color: #F8BBD0;
        border-color: #F8BBD0;
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
