@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <!-- Título de la página -->
    <h1 class="mb-4 text-center" style="color: pink;">Detalles </h1>

    <!-- Card para detalles del cliente -->
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body text-center">
            <h5 class="card-title text-dark" style="font-weight: 600; font-size: 2rem; color: pink;">{{ $cliente->first_name }} {{ $cliente->last_name }}</h5>
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <p><strong><i class="fas fa-phone-alt" style="color: pink;"></i> Número de contacto:</strong> {{ $cliente->phone }}</p>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <p><strong><i class="fas fa-envelope" style="color: pink;"></i> Correo electrónico:</strong> {{ $cliente->user->email ?? 'Correo no disponible' }}</p>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <p><strong><i class="fas fa-venus-mars" style="color: pink;"></i> Género:</strong> {{ $cliente->gender === 'H' ? 'Hombre' : 'Mujer' }}</p>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <p><strong><i class="fas fa-birthday-cake" style="color: pink;"></i> Edad:</strong> {{ $cliente->age }} años</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón para regresar a la lista de clientes -->
    <div class="mt-4 text-center">
        <a href="{{ route('clientes.index') }}" class="btn btn-pink btn-lg">
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
    /* Fondo de la página */
    body {
        background-color: #f0f4f8; /* Fondo suave y claro */
        font-family: 'Roboto', sans-serif; /* Tipografía moderna */
    }

    h1 {
        font-family: 'Roboto', sans-serif;
        font-size: 2.5rem;
        font-weight: 600;
        color: #D5006D;
    }

    .card {
        transition: transform 0.3s ease-in-out; /* Transición suave */
        border-radius: 15px; /* Bordes redondeados */
    }

    .card:hover {
        transform: scale(1.05); /* Efecto de escala al pasar el ratón */
    }

    .card-title {
        color: #333; /* Color del título */
        font-size: 2rem; /* Título más grande */
        font-weight: 600;
        margin-bottom: 20px;
    }

    .card-body p {
        font-size: 1.125rem;
        line-height: 1.6;
        color: #555; /* Color más suave para los textos */
    }

    .btn-pink {
        background-color: #D5006D;
        border-color: #D5006D;
        font-size: 1.1rem;
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 500;
    }

    .btn-pink:hover {
        background-color: #b0004b;
        border-color: #b0004b;
        transform: translateY(-2px); /* Sutil elevación al hacer hover */
    }

    .btn-pink i {
        margin-right: 8px; /* Espaciado entre el ícono y el texto */
    }

    /* Efectos de sombra y bordes para la tarjeta */
    .card {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Sombra suave */
    }

    /* Añadir un margen superior a los elementos de la página */
    .container {
        margin-top: 50px;
    }

    /* Estilo para los iconos dentro de las columnas */
    .fa {
        color: #D5006D;
        font-size: 1.4rem;
    }

    .row {
        margin-top: 20px;
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
