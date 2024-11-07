@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1>Registrar Nuevo Cliente</h1>

    <form id="registrarClienteForm">
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
            <label for="phone" class="form-label">Número de Contacto</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Cliente</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver a la Lista de Clientes</a>
    </form>
</div>

@section('scripts')
<script>
    // Manejar el envío del formulario de registro
    document.getElementById('registrarClienteForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío normal del formulario
        const formData = new FormData(this);
        
        fetch('/clientes', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            }
        })
        .then(response => response.json())
        .then(data => {
            alert('Cliente registrado exitosamente.');
            window.location.href = '{{ route('clientes.index') }}'; // Redirigir a la lista de clientes
        })
        .catch(error => console.error('Error:', error));
    });
</script>
@endsection
@endsection
