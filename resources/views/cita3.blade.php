@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success custom-alert-container" role="alert">
            <div class="custom-alert">
                <i class="bx bxs-envelope"></i> {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Resto del contenido -->

<style>
    /* Contenedor centrado */
    .custom-alert-container {
        display: flex;
        justify-content: center; /* Centrado horizontal */
        align-items: center; /* Centrado vertical */
        min-height: 100vh; /* Ocupa toda la pantalla */
        background-color: #f8f9fa; /* Color de fondo claro */
    }

    /* Estilo del cuadro de alerta */
    .custom-alert {
        width: 300px; /* Ancho fijo para que sea cuadrado */
        height: 300px; /* Alto igual al ancho */
        background-color: #000000; /* Fondo negro */
        color: #ffb7c2; /* Texto rosa */
        border: 2px solid #ffb7c2; /* Borde rosa */
        font-size: 20px; /* Texto ligeramente más grande */
        font-weight: bold;
        padding: 20px;
        border-radius: 15px; /* Bordes ligeramente redondeados */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Sombra elegante */
        display: flex;
        flex-direction: column; /* Ícono arriba, texto abajo */
        justify-content: center; /* Centra el contenido en el cuadro */
        align-items: center; /* Centra el contenido en el cuadro */
        gap: 15px; /* Espacio entre ícono y texto */
        animation: fadeIn 1s ease-in-out;
        text-align: center; /* Centra el texto */
    }

    /* Estilo del ícono */
    .custom-alert i {
        font-size: 50px; /* Tamaño más grande del ícono */
        color: #ffb7c2; /* Ícono rosa */
    }

    /* Animación de entrada */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9); /* Aparece desde un tamaño más pequeño */
        }
        to {
            opacity: 1;
            transform: scale(1); /* Tamaño original */
        }
    }
</style>
@endsection
