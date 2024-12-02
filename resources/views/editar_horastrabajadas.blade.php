<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Horas Trabajadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center mb-4">Editar Horas Trabajadas</h1>

    <form action="{{ route('horas_trabajadas.update', ['nomina_id' => $nomina_id, 'empleado_id' => $empleado_id, 'id' => $hora->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Campo de fecha -->
        <div class="mb-3">
            <label for="date_worked" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="date_worked" name="date_worked" value="{{ $hora->date_worked }}" required>
        </div>

        <!-- Campo de hora de entrada -->
        <div class="mb-3">
            <label for="start_time" class="form-label">Hora de Entrada</label>
            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $hora->start_time }}" required>
        </div>

        <!-- Campo de hora de salida -->
        <div class="mb-3">
            <label for="end_time" class="form-label">Hora de Salida</label>
            <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $hora->end_time }}" required>
        </div>

        <!-- Botón para guardar los cambios -->
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

    <br>
    <a href="{{ route('horas_trabajadas.index', ['nomina_id' => $nomina_id, 'empleado_id' => $empleado_id]) }}" class="btn btn-secondary">Volver</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
