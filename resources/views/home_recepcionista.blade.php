@extends('layouts.recepcionista')

@section('content')
<style>
   
    /* Estilos para el contenido */
    .content {
        padding:3%;
        position: relative; /* Para colocar contenido encima del video */
        color:  #ff77a7; /* Color del texto principal */
        text-align: center;
        z-index: 1; /* Asegura que el contenido esté en frente del video */
    }

    .welcome-card {
        background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco semi-transparente */
        border: 2px solid #ff77a7; /* Borde rosa */
        border-radius: 15px; /* Bordes redondeados */
        padding: 30px; /* Espaciado interno */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* Sombra */
        transition: transform 0.3s; /* Efecto de elevación al pasar el mouse */
        margin: 0 auto; /* Centrar la tarjeta */
        max-width: 600px; /* Ancho máximo de la tarjeta */
        clip-path: circle(0%); /* Inicialmente el círculo es 0% */
        animation: 2.5s cubic-bezier(.25, 1, .30, 1) circle-in-hesitate both; /* Aplicar la animación */
    }

    .welcome-card:hover {
        transform: translateY(-5px); /* Elevar tarjeta al pasar el mouse */
    }

    
    /* Animación para el círculo */
    @keyframes circle-in-hesitate {
        0% {
            clip-path: circle(0%);
        }
        40% {
            clip-path: circle(40%);
        }
        100% {
            clip-path: circle(125%);
        }
    }

</style>


<!-- Contenido principal -->
<div class="container-fluid content">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-8">
            <div class="welcome-card" transition-style="in:circle:hesitate">
                <h1 class="display-4 font-weight-bold">Bienvenido, Recepcionista</h1>
                <p class="lead">¡Gestiona tu salón de belleza de manera eficiente y efectiva!</p>
                <h2>Información del Recepcionista</h2>
                <p>Nombre: <strong>{{ $recepcionista->nombre }}</strong></p>
                <p>Fecha de Ingreso: <strong>{{ $recepcionista->fecha_ingreso }}</strong></p>
            </div>
        </div>
    </div>
</div>

<footer class="text-center p-3 mt-5">
    <p>© {{ date('Y') }} Tu Salón de Belleza. Todos los derechos reservados.</p>
</footer>
@endsection
