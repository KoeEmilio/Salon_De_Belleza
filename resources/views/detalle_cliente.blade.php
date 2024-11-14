@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center" style="color: #D5006D;">Detalles del Cliente</h1>

    <div class="card shadow-lg border-0">
        <div class="card-body text-center">
            <h5 class="card-title" style="color: #D5006D;">{{ $cliente->name }} {{ $cliente->last_name }}</h5>
            <p><strong><i class="fas fa-phone"></i> Número de contacto:</strong> {{ $cliente->phone }}</p>
            <p><strong><i class="fas fa-envelope"></i> Correo electrónico:</strong> {{ $cliente->e_mail }}</p>
            <p><strong><i class="fas fa-venus-mars"></i> Género:</strong> {{ $cliente->gender === 'H' ? 'Hombre' : 'Mujer' }}</p>
            <p><strong><i class="fas fa-calendar-alt"></i> Edad:</strong> {{ $cliente->age }} años</p>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Regresar a la Lista de Clientes
        </a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Animación de entrada al cargar la vista
    document.addEventListener("DOMContentLoaded", function() {
        const card = document.querySelector('.card');
        card.classList.add('animate__animated', 'animate__fadeIn'); // Usar animate.css
    });
</script>
@endsection

<style>
    body {
        background-color: #f8f9fa; /* Color de fondo claro para el cuerpo */
    }

    .card {
        transition: transform 0.2s; /* Animación suave al pasar el ratón */
    }

    .card:hover {
        transform: scale(1.05); /* Aumenta el tamaño al pasar el ratón */
    }

    .btn-secondary {
        background-color: #D5006D; /* Mantiene el mismo color para el botón */
        border-color: #D5006D; /* Borde del botón */
    }

    .btn-secondary:hover {
        background-color: #b0004b; /* Color de fondo del botón al pasar el ratón */
        border-color: #b0004b; /* Borde del botón al pasar el ratón */
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
