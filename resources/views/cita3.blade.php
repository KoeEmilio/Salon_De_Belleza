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
body {
        font-family: Arial, sans-serif;
        background-color: #fff0f5;
    }
    
    /* Contenedor centrado */
    .custom-alert-container {
        display: flex;
        justify-content: center; 
        align-items: center; 
        min-height: 100vh;
        background-color: #f8f9fa; 
    }

    /* Estilo del cuadro de alerta */
    .custom-alert {
        width: 300px;
        height: 300px; 
        background-color: #000000; 
        color: #ffb7c2; 
        border: 2px solid #ffb7c2; 
        font-size: 20px; 
        font-weight: bold;
        padding: 20px;
        border-radius: 15px; 
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); 
        display: flex;
        flex-direction: column; 
        justify-content: center; 
        align-items: center; 
        gap: 15px; 
        animation: fadeIn 1s ease-in-out;
        text-align: center; 
    }

    /* Estilo del ícono */
    .custom-alert i {
        font-size: 50px;
        color: #ffb7c2; 
    }

    /* Animación de entrada */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9); 
        }
        to {
            opacity: 1;
            transform: scale(1); 
        }
    }
</style>
@endsection
