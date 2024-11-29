@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Gestión de Citas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para agregar una nueva cita -->
    <div class="mb-4 text-center">
        <a href="{{ route('appointment.create') }}" class="btn btn-success">Agregar Cita</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Fecha Registro</th>
                    <th>Fecha Cita</th>
                    <th>Cliente</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>Tipo de Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($citas as $cita)
                    <tr>
                        <td>{{ $cita->sign_up_date }}</td>
                        <td>{{ $cita->appointment_day }}</td>
                        <td>{{ $cita->owner->first_name ?? 'Sin asignar' }}  {{ $cita->owner->last_name ?? 'Sin asignar' }} </td>
                        <td>{{ $cita->appointment_time }}</td>
                        <td>{{ $cita->status }}</td>
                        <td>{{ $cita->payment_type }}</td>
                        <td>
                            <a href="{{ route('appointment.edit', $cita->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('service.index', $cita->id) }}" class="btn btn-secondary">Ver Servicios</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
