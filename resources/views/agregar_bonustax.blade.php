<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Bono/Impuesto</title>
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
        <h1>Agregar Bono/Impuesto</h1>
    </div>

    <div class="container">
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
