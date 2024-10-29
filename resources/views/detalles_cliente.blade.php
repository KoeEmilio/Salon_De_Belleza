@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Detalles del Cliente</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $cliente->name }} {{ $cliente->last_name }}</h5>
            <p class="card-text"><strong>Número de contacto:</strong> {{ $cliente->phone }}</p>
            <p class="card-text"><strong>Correo electrónico:</strong> {{ $cliente->e_mail }}</p>
            <p class="card-text"><strong>Género:</strong> {{ $cliente->gender == 'H' ? 'Hombre' : 'Mujer' }}</p>
            <p class="card-text"><strong>Edad:</strong> {{ $cliente->age }} años</p>
            <a href="{{ route('clientes.historial', $cliente->id) }}" class="btn btn-info">Ver Historial de Citas</a>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver a la Lista de Clientes</a>
        </div>
    </div>
</div>
@endsection
