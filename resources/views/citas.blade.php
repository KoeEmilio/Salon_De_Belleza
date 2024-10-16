@extends('layouts.app')

@section('content')
<div class="container text-center my-5">
    <h1>Agenda una Cita</h1>
    <p>Reserva tu cita con nuestros expertos.</p>

    <form action="/reservar-cita" method="POST" class="my-4">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
        </div>
        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" class="form-control" id="hora" name="hora" required>
        </div>
        <button type="submit" class="btn btn-primary">Reservar Cita</button>
    </form>
</div>
@endsection
