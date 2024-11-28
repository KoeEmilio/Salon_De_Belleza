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
            <thead class="bg-black text-pink">
                <tr>
                    <th><i class="fas fa-calendar-alt"></i> Fecha Registro</th>
                    <th><i class="fas fa-calendar-day"></i> Fecha Cita</th>
                    <th><i class="fas fa-clock"></i> Hora Cita</th>
                    <th><i class="fas fa-user"></i> Cliente</th>
                    <th><i class="fas fa-info-circle"></i> Estado</th>
                    <th><i class="fas fa-credit-card"></i> Tipo de Pago</th>
                    <th><i class="fas fa-cogs"></i> Acciones</th>
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
                            <!-- Botón de Editar -->
                            <a href="{{ route('citas.edit', $cita->id) }}" class="edit-button me-4">
                                <svg class="edit-svgIcon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </a>
                        
                            <!-- Botón de Ver Servicios -->
                            <a href="{{ route('services.index', ['client_id' => $cita->owner->id]) }}" class="ms-4">
                                <i class="fas fa-eye text-dark"></i>
                            </a>
                        </td>
                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
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

                @for ($i = 1; $i <= $citas->lastPage(); $i++)
                    <li class="page-item {{ ($citas->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $citas->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

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
    .bg-black {
        background-color: black !important;
    }

    .text-pink {
        color: #F06292 !important;
    }

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

    .table td {
        font-size: 1rem;
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
    .fas.fa-eye {
    font-size: 1.2rem; /* Tamaño del ícono */
}
</style>
@endsection
