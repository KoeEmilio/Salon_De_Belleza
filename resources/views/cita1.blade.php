@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Servicios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <!-- Paso de progreso -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="text-center">
            <div class="rounded-circle bg-warning text-white py-2 px-3 mb-1">1</div>
            <small>Paso 1<br>Servicio</small>
        </div>
        <div class="flex-grow-1 mx-2 bg-secondary" style="height: 2px;"></div>
        <div class="text-center">
            <div class="rounded-circle bg-secondary text-white py-2 px-3 mb-1">2</div>
            <small>Paso 2<br>Datos del Cliente</small>
        </div>
        <div class="flex-grow-1 mx-2 bg-secondary" style="height: 2px;"></div>
        <div class="text-center">
            <div class="rounded-circle bg-secondary text-white py-2 px-3 mb-1">3</div>
            <small>Paso 3<br>Confirmación</small>
        </div>
    </div>

    <!-- Formulario de selección -->
    <div class="card p-4">
        <form>
            <div class="mb-3">
                <label for="servicio" class="form-label">Servicios</label>
                <select id="servicio" class="form-select" aria-label="Selecciona un servicio">
                    <option selected>Selecciona un servicio</option>
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="especialista" class="form-label">Especialista</label>
                <select id="especialista" class="form-select" aria-label="Selecciona a tu especialista">
                    <option selected>Selecciona a tu especialista</option>
                    <option value="1">Especialista 1</option>
                    <option value="2">Especialista 2</option>
                    <option value="3">Especialista 3</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" id="fecha" class="form-control">
            </div>

            <button type="submit" class="btn btn-warning w-100">CONTINUAR</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS (opcional, para funcionalidad adicional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
