<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Bono/Impuesto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Agregar Bono/Impuesto</h1>

    <form action="{{ route('bonos.impuestos.store', ['employee_id' => $empleado->id, 'nomina_id' => $nomina->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <select id="type" name="type" class="form-control" required>
                <option value="Bono">Bono</option>
                <option value="Impuesto">Impuesto</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" id="description" name="description" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Monto</label>
            <input type="number" id="amount" name="amount" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="date_recorded" class="form-label">Fecha</label>
            <input type="date" id="date_recorded" name="date_recorded" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('bonos.impuestos', ['employee_id' => $empleado->id, 'nomina_id' => $nomina->id]) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
