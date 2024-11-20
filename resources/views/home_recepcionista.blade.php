@extends('layouts.recepcionista')

@section('content')

<div class="container-fluid content">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="welcome-card">
                <h1 class="display-4 font-weight-bold">Bienvenido, Recepcionista</h1>
                <p class="lead">¡Gestiona tu salón de belleza de manera eficiente y efectiva!</p>
                <h2>Información del Recepcionista</h2>

                <p>Nombre: <strong>{{ $recepcionista->name }}</strong></p>
                <p>Correo: <strong>{{ $recepcionista->email }}</strong></p>
                <p>Fecha de Ingreso: <strong>{{ now()->format('Y-m-d') }}</strong></p>
            </div>
        </div>
    </div>
</div>
<style>
    .content {
        padding: 3%;
        position: relative;
        color: #ff77a7;
        text-align: center;
        z-index: 1;
    }

    .welcome-card {
        background-color: rgba(255, 255, 255, 0.9);
        border: 2px solid #ff77a7;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s;
        margin: 0 auto;
        max-width: 600px;
        clip-path: circle(0%);
        animation: 2.5s cubic-bezier(.25, 1, .30, 1) circle-in-hesitate both;
    }

    .welcome-card:hover {
        transform: translateY(-5px);
    }

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

    @media (max-width: 768px) {
        .welcome-card {
            padding: 20px;
            max-width: 100%; 
            margin: 10px;
        }

        .content {
            padding: 5%;
        }

        h1.display-4 {
            font-size: 1.8rem; 
        }

        p.lead {
            font-size: 1rem; 
        }
    }

    @media (max-width: 576px) {
        .welcome-card {
            padding: 15px;
            border-radius: 10px;
        }

        h1.display-4 {
            font-size: 1.5rem;
        }

        p.lead {
            font-size: 0.9rem;
        }
    }
</style>
@endsection
