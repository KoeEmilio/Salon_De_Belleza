@extends('layouts.app')

@section('content')
<div class="container text-center my-5">
    <h1>Galería</h1>
    <p>Explora nuestro portafolio de trabajos y transformaciones.</p>

    <div class="row my-4">
        <div class="col-md-4">
            <img src="https://via.placeholder.com/300x200" alt="Trabajo 1" class="img-fluid">
            <p>Corte y peinado</p>
        </div>
        <div class="col-md-4">
            <img src="https://via.placeholder.com/300x200" alt="Trabajo 2" class="img-fluid">
            <p>Coloración y estilo</p>
        </div>
        <div class="col-md-4">
            <img src="https://via.placeholder.com/300x200" alt="Trabajo 3" class="img-fluid">
            <p>Manicure y Pedicure</p>
        </div>
    </div>
</div>
@endsection
