@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4" style="color: #D5006D;">Lista de Clientes</h1>

    <!-- Formulario de búsqueda -->
    <form action="{{ route('recepcionista.clientes2') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Buscar por nombre" value="{{ request()->input('query') }}" style="border: 2px solid #D5006D;">
            <button class="btn" type="submit" style="background-color: #D5006D; color: white;">Buscar</button>
        </div>
    </form>

    <div class="mb-3">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearClienteModal">Agregar Cliente</button>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark" style="background-color: #000; color: white;">
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Número de Contacto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->name }} {{ $cliente->last_name }}</td>
                    <td>{{ $cliente->e_mail }}</td>
                    <td>{{ $cliente->phone }}</td>
                    <td>
                        <button class="btn btn-info" onclick="verDetalles({{ $cliente->id }})" data-bs-toggle="modal" data-bs-target="#detallesClienteModal">Ver Detalles</button>
                        <a href="{{ route('clientes.historial', $cliente->id) }}" class="btn btn-warning">Historial de Citas</a>
                        <button class="btn btn-danger" onclick="eliminarCliente({{ $cliente->id }})">Eliminar</button>
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

@section('scripts')
<script>
    function verDetalles(id) {
        fetch(`/clientes/${id}`)
            .then(response => response.json())
            .then(data => {
                const contenido = `
                    <h5>${data.name} ${data.last_name}</h5>
                    <p><strong>Número de contacto:</strong> ${data.phone}</p>
                    <p><strong>Correo electrónico:</strong> ${data.e_mail}</p>
                    <p><strong>Género:</strong> ${data.gender === 'H' ? 'Hombre' : 'Mujer'}</p>
                    <p><strong>Edad:</strong> ${data.age} años</p>
                `;
                document.getElementById('detallesClienteContenido').innerHTML = contenido;
            })
            .catch(error => console.error('Error:', error));
    }

    function eliminarCliente(id) {
        if (confirm("¿Estás seguro de que quieres eliminar este cliente?")) {
            fetch(`/clientes/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                location.reload(); // Recargar la página para actualizar la lista
            })
            .catch(error => console.error('Error:', error));
        }
    }

    // Manejar el envío del formulario de creación de cliente
    document.getElementById('crearClienteForm').addEventListener('submit', function(event) {
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
            alert('Cliente agregado exitosamente.');
            location.reload(); // Recargar la página para ver el nuevo cliente
        })
        .catch(error => console.error('Error:', error));
    });
</script>
@endsection

<style>
    body {
        font-family: 'Roboto', sans-serif; /* Cambia a otra fuente si prefieres */
        background-color: #f8f9fa; /* Color de fondo claro para el cuerpo */
    }

    .table th, .table td {
        text-align: center; /* Centrar el texto en las celdas */
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #ffeef8; /* Color rosa claro para filas impares */
    }

    .table-hover tbody tr:hover {
        background-color: #f1c7d4; /* Color rosa más claro al pasar el ratón */
    }
</style>
@endsection
