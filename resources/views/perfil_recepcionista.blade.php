@extends('layouts.recepcionista')

@section('content')
<div class="container text-center">
    <h1 class="display-4">Perfil de {{ $recepcionista->nombre }}</h1>
    <p>Información del perfil:</p>
    <ul class="list-unstyled">
        <li>Nombre: {{ $recepcionista->nombre }}</li>
        <li>Fecha de ingreso: {{ $recepcionista->fecha_ingreso }}</li>
    </ul>
</div>
@endsection
