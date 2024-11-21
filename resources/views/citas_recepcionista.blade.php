@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-pink mb-4 animate__animated animate__fadeInDown">Gestión de Citas</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Barra de búsqueda -->
    <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap">
        <div>
            <a href="{{ route('citas.create') }}" class="btn btn-outline-secondary mb-4">
                <i class="fas fa-plus-circle"></i> Agregar Nueva Cita
            </a>
        </div>
        <form action="{{ route('citas.index') }}" method="GET" class="d-flex flex-wrap">
            <input type="text" name="search" class="form-control me-2 mb-2 mb-md-0" placeholder="Buscar por cliente o fecha" value="{{ request()->get('search') }}">
            <button class="btn btn-pink" type="submit">
                <i class="fas fa-search"></i> Buscar
            </button>
        </form>
    </div>

    <!-- Tabla de Citas -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-pink text-white">
                <tr>
                    <th>Fecha Registro</th>
                    <th>Fecha Cita</th>
                    <th>Hora Cita</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th>Tipo de Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                    <tr>
                        <td>{{ $cita->sign_up_date }}</td>
                        <td>{{ $cita->appointment_day }}</td>
                        <td>{{ $cita->appointment_time }}</td>
                        <td>{{ $cita->owner ? $cita->owner->first_name . ' ' . $cita->owner->last_name : 'Desconocido' }}</td>
                        <td>{{ $cita->status }}</td>
                        <td>{{ $cita->payment_type }}</td>
                        <td>
                            <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{ route('services.index', ['client_id' => $cita->owner->id]) }}" class="btn btn-info">
                                <i class="fas fa-eye"></i> Ver Servicios
                            </a>
                            <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   <!-- Paginación de Bootstrap -->
   <div class="d-flex justify-content-center mt-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- Botón "Anterior" -->
            @if ($citas->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">Anterior</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $citas->previousPageUrl() }}" aria-label="Previous">
                        Anterior
                    </a>
                </li>
            @endif

            <!-- Números de página -->
            @for ($i = 1; $i <= $citas->lastPage(); $i++)
                <li class="page-item {{ ($citas->currentPage() == $i) ? 'active' : '' }}">
                    <a class="page-link" href="{{ $citas->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            <!-- Botón "Siguiente" -->
            @if ($citas->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $citas->nextPageUrl() }}" aria-label="Next">
                        Siguiente
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
</div>

<style>
    .btn-outline-secondary {
        color: #6c757d;
        border-color: #6c757d;
    }
    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: white;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table th {
        font-weight: bold;
        font-size: 1.1rem;
        color: #fff;
        background-color: #F06292;
    }

    .table td {
        font-size: 1rem;
    }

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pagination .page-item.active .page-link {
        background-color: #F06292;
        border-color: #F06292;
        color: white;
    }

    .pagination .page-link {
        color: #F06292;
        border: 1px solid #F06292;
        font-size: 1rem;
    }

    .pagination .page-link:hover {
        background-color: #f8c8d1;
        color: #F06292;
    }

    .pagination .page-item {
        margin: 0 2px;
    }

    /* Estilo responsive */
    @media (max-width: 767px) {
        .table-responsive {
            overflow-x: auto;
        }

        .table th, .table td {
            font-size: 0.9rem;
            padding: 0.5rem;
        }

        .pagination {
            font-size: 0.9rem;
        }

        .btn-outline-secondary {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .table th, .table td {
            font-size: 0.8rem;
            padding: 0.5rem;
        }

        .btn {
            font-size: 0.8rem;
            padding: 0.3rem 0.5rem;
        }

        .pagination .page-link {
            font-size: 0.8rem;
        }
    }
</style>
@endsection
