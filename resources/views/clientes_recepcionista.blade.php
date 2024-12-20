@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4" style="color: #F06292;">Lista de Clientes</h1>

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <div class="d-flex">
            <form action="{{ route('clientes.index') }}" method="GET" class="d-flex">
                <input type="text" name="query" class="form-control me-2" placeholder="Buscar por nombre" value="{{ request()->input('query') }}" style="border: 2px solid #F06292;">
                <button class="btn btn-outline-secondary" type="submit" style="background-color: #F06292; color: white;">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark" style="background-color: #000000; color: #F06292;">
            <tr>
                <th><i class="fas fa-user"></i> Nombre</th>
                <th><i class="fas fa-calendar-alt"></i> Edad</th>
                <th><i class="fas fa-phone"></i> Número de Contacto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->first_name }} {{ $cliente->last_name }}</td>
                    <td>{{ $cliente->age }}</td>
                    <td>{{ $cliente->phone }}</td>
                    <td>
                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-dark text-pink">
                            <i class="fas fa-eye" style="color: #F06292;"></i> Ver Detalles
                        </a>
                        <a href="{{ route('clientes.historial_citas', $cliente->id) }}" class="btn btn-dark text-pink">
                            <i class="fas fa-calendar-alt" style="color: #F06292;"></i> Historial de Citas
                        </a>                    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
               
                @if ($clientes->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Anterior</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $clientes->previousPageUrl() }}" aria-label="Previous">Anterior</a>
                    </li>
                @endif

                
                @foreach ($clientes->getUrlRange(1, $clientes->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $clientes->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

               
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

    body {
        background-color: #FCE4EC; 
        font-family: 'Roboto', sans-serif;
    }

    h1 {
        font-size: 2.5rem;
        font-weight: 600;
        color: #F06292; 
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

    .table-dark {
        background-color: #000000; 
    }

    .pagination .page-item.active .page-link {
        background-color: #F06292;
        border-color: #F06292;
    }

    .pagination .page-link {
        color: #F06292;
    }

    .btn-dark {
        background-color: #000000;
        color: white;
    }

    .btn-dark:hover {
        background-color: #333333;
    }

    .text-pink {
        color: #F06292;
    }

    .btn i {
        margin-right: 5px;
    }

    .page-item.disabled .page-link {
        background-color: #F8BBD0;
        border-color: #F8BBD0;
    }

    @media (max-width: 1200px) {
        .table th, .table td {
            font-size: 1rem;
        }

        h1 {
            font-size: 2rem;
        }
    }

    @media (max-width: 992px) {
        h1 {
            text-align: center;
            font-size: 1.8rem;
        }

        .table {
            font-size: 0.9rem;
        }

        .btn {
            font-size: 0.9rem;
            padding: 5px 10px;
        }
    }

    @media (max-width: 768px) {
        .d-flex {
            flex-wrap: wrap;
        }

        .table {
            font-size: 0.85rem;
        }

        .btn {
            font-size: 0.8rem;
            padding: 5px 8px;
        }

        h1 {
            font-size: 1.5rem;
        }

        .pagination {
            flex-wrap: wrap;
            justify-content: center;
        }

        .page-link {
            font-size: 0.8rem;
        }
    }

    @media (max-width: 576px) {
        h1 {
            font-size: 1.3rem;
        }

        .table th, .table td {
            font-size: 0.75rem;
            padding: 10px;
        }

        .btn {
            font-size: 0.75rem;
            padding: 4px 6px;
        }

        .d-flex.justify-content-between {
            flex-direction: column;
            align-items: stretch;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .pagination {
            font-size: 0.7rem;
        }
    }
</style>


<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
