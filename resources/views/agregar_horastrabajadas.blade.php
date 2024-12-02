<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Horas Trabajadas - {{ $empleado->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container">
    <a href="{{ route('horas_trabajadas.index', ['nomina_id' => $nomina->id, 'empleado_id' => $empleado->id]) }}" class="btn btn-secondary btn-sm back-btn">Regresar a Horas Trabajadas</a>

    <h1 class="mb-4 text-center">Agregar Horas Trabajadas para {{ $empleado->name }}</h1>

    <form action="{{ route('horas_trabajadas.store') }}" method="POST">
        @csrf
        <input type="hidden" name="nomina_id" value="{{ $nomina->id }}">
        <input type="hidden" name="empleado_id" value="{{ $empleado->id }}">

        <div class="mb-3">
            <label for="date_worked" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="date_worked" name="date_worked" required>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Hora de Entrada</label>
            <input type="time" class="form-control" id="start_time" name="start_time" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">Hora de Salida</label>
            <input type="time" class="form-control" id="end_time" name="end_time" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
