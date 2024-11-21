@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4" style="color: #D5006D;">Lista de Clientes</h1>

    <!-- Formulario de búsqueda -->
    <form action="{{ route('clientes.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Buscar por nombre" value="{{ request()->input('query') }}" style="border: 2px solid #D5006D;">
            <button class="btn" type="submit" style="background-color: #D5006D; color: white;">Buscar</button>
        </div>
    </form>

    <div class="mb-3">
        <a href="{{ route('agregar_clienterecepcionista') }}" class="btn btn-success">Agregar Cliente</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark" style="background-color: #000; color: white;">
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
                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info">Ver Detalles</a>
                        <a href="{{ route('clientes.historial_citas', $cliente->id) }}" class="btn btn-warning">Historial de Citas</a>                    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $clientes->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
