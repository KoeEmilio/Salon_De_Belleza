@extends('layouts.app')

@section('content')
<div class="container text-center my-5">
    <h1>Contacto</h1>
    <p>Ponte en contacto con nosotros para hacer una reserva o consultar nuestros servicios.</p>

    <form action="/enviar-mensaje" method="POST" class="my-4">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
    </form>
</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3598.5198005883517!2d-103.41203772477517!3d25.587638177461706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fda61208a9159%3A0x8297d1b2f4a3236d!2sC.%20Lolo%20de%20M%C3%A9ndez%2065%2C%20Villa%20Florida%2C%2027105%20Torre%C3%B3n%2C%20Coah.!5e0!3m2!1ses-419!2smx!4v1730944164816!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection
