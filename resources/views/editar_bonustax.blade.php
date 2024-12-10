<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Bono/Impuesto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #000;
            color: #fff;
            padding: 20px 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar h1 {
            color: #ff69b4;
            margin: 0;
            font-size: 2rem;
        }

        .container {
            margin-top: 20px;
            max-width: 900px;
            padding: 2rem;
            background-color: #fff;
            border-radius: 10px;
            border: 2px solid #000;
        }

        h1 {
            color: #ff69b4;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        label {
            color: #333;
        }

        .btn-success {
            background-color: #000;
            color: #ff69b4;
            border: none;
        }

        .btn-success:hover {
            background-color: #333;
        }

        .btn-secondary {
            background-color: #ff69b4;
            color: #fff;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #e052a0;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Editar Bono/Impuesto</h1>
    </div>

    <div class="container">
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
