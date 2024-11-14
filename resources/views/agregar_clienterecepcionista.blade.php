@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4" style="color: #D5006D;">Agregar Cliente</h1>

    <form id="crearClienteForm" action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="mb-3">
            <label for="e_mail" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="e_mail" name="e_mail" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Número de Contacto</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Género</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="">Seleccione</option>
                <option value="H">Hombre</option>
                <option value="M">Mujer</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Edad</label>
            <input type="number" class="form-control" id="age" name="age" required min="0" max="120">
        </div>
        <button type="submit" class="btn btn-primary">Agregar Cliente</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary ms-2">Regresar</a> <!-- Botón para regresar -->
    </form>
</div>
@endsection
