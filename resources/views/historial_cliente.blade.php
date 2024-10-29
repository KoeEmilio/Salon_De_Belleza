@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Historial de Citas de {{ $cliente->name }} {{ $cliente->last_name }}</h1>

    @if($citas->isEmpty())
        <p>No hay citas registradas para este cliente.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tipo de Cita</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                    <tr>
                        <td>{{ $cita->date }}</td>
                        <td>{{ $cita->time }}</td>
                        <td>{{ $cita->type }}</td>
                        <td>{{ $cita->notes }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver a la Lista de Clientes</a>
</div>
@endsection
