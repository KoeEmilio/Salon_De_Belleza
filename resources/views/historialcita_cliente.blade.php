@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4" style="color: #D5006D;">
        <i class="fas fa-calendar-alt"></i> Historial de Citas de {{ $cliente->name }} {{ $cliente->last_name }}
    </h1>
    
    <div class="mb-3">
        <a href="{{ route('clientes.index') }}" class="btn btn-outline-dark" style="background-color: #D5006D; color: white;">
            <i class="fas fa-arrow-left"></i> Regresar
        </a>
    </div>

    <!-- Mostrar las citas -->
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark" style="background-color: #D5006D; color: white;">
            <tr>
                <th>Día de la Cita</th>
                <th>Hora de la Cita</th>
                <th>Estado</th>
                <th>Tipo de Pago</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr class="animated-row">
                    <td>{{ \Carbon\Carbon::parse($appointment->appointment_day)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}</td>
                    <td>
                        <span class="badge 
                            @if($appointment->status === 'pendiente') badge-warning 
                            @elseif($appointment->status === 'confirmada') badge-success 
                            @else badge-danger @endif">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </td>
                    <td>{{ ucfirst($appointment->payment_type) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@section('scripts')
<script>
    // Añadir animación de entrada a las filas de la tabla
    document.querySelectorAll('.animated-row').forEach(row => {
        row.classList.add('fade-in');
    });
</script>
@endsection

<style>
    body {
        font-family: 'Roboto', sans-serif; /* Cambiar a fuente más moderna */
        background-color: #fef2f7; /* Rosa suave de fondo */
    }

    .table th, .table td {
        text-align: center; /* Centrar texto en celdas */
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #ffeef8; /* Color rosa claro para filas impares */
    }

    .table-hover tbody tr:hover {
        background-color: #f1c7d4; /* Color rosa más claro al pasar el ratón */
    }

    /* Animaciones */
    .fade-in {
        animation: fadeIn 0.5s ease forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Estilo personalizado para las filas de la tabla */
    .table-hover tbody tr {
        transition: background-color 0.3s ease;
    }

    .table-dark th {
        background-color: #D5006D !important; /* Rosa suave para el encabezado */
    }

    /* Iconos */
    .fas {
        color: white;
    }
</style>
@endsection
