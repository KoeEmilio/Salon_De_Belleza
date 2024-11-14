@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Columna izquierda: Formulario de contacto -->
        <div class="col-md-6">
            <h1 class="text-pink">Contacto</h1>
            <p>Ponte en contacto con nosotros para hacer una reserva o consultar nuestros servicios.</p>

            <form action="/enviar-mensaje" method="POST" class="my-4">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label text-pink">Nombre</label>
                    <input type="text" class="form-control border-pink" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-pink">Correo Electrónico</label>
                    <input type="email" class="form-control border-pink" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label text-pink">Mensaje</label>
                    <textarea class="form-control border-pink" id="mensaje" name="mensaje" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-pink">Enviar Mensaje</button>
            </form>
        </div>

        <!-- Columna derecha: Imagen -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <img src="/AH2.png" alt="cont" class="img-fluid" style="max-width: 70%; height: auto;">
        </div>
    </div>
</div>

<!-- Agrega estilos personalizados para los colores rosas -->
<style>
    .text-pink {
        color: #fe889f;
    }
    .border-pink {
        border-color: #fe889f !important;
    }
    .btn-pink {
        background-color: #ffb7c2;
        color: white;
        border: none;
    }
    .btn-pink:hover {
        background-color: #faccd3;
    }
</style>
@endsection
