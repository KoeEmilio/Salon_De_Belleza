<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Bono/Impuesto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container">
    <h1 class="text-center my-4">Editar Bono/Impuesto</h1>
    <form action="{{ route('bonos.impuestos.update', ['employee_id' => $empleado->id, 'nomina_id' => $nomina->id, 'id' => $bonustax->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <select name="type" id="type" class="form-select">
                <option value="Bono" {{ $bonustax->type == 'Bono' ? 'selected' : '' }}>Bono</option>
                <option value="Impuesto" {{ $bonustax->type == 'Impuesto' ? 'selected' : '' }}>Impuesto</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ $bonustax->description }}" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Monto</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ $bonustax->amount }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="date_recorded" class="form-label">Fecha Registrada</label>
            <input type="date" name="date_recorded" id="date_recorded" class="form-control" value="{{ \Carbon\Carbon::parse($bonustax->date_recorded)->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('bonos.impuestos', ['employee_id' => $bonustax->employee_id, 'nomina_id' => $nomina->id]) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
