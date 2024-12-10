<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Horas Trabajadas - {{ $empleado->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px;
        }

        .navbar {
            background-color: #000;
            color: #fff;
            padding: 20px 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .navbar h1 {
            color: #ff69b4;
            margin: 0;
            font-size: 2rem;
        }

        h1 {
            color: #ff69b4;
            text-align: center;
        }

        .btn {
            border-radius: 5px;
        }

        .btn-secondary {
            background-color: #ff69b4;
            border-color: #ff69b4;
        }

        .btn-success {
            background-color: #000;
            border-color: #000;
            color: #ff69b4;
        }

        .btn-success i {
            color: #ff69b4;
        }

        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }

            .btn {
                margin: 5px 0;
                width: 100%;
            }

            .card-text {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 1.5rem;
            }

            .card-title {
                font-size: 1rem;
            }

            .card-text {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Agregar Horas Trabajadas </h1>
    </div>

    <div class="container">


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

            <button type="submit" class="btn btn-success">Guardar</button>        <a href="{{ route('horas_trabajadas.index', ['nomina_id' => $nomina->id, 'empleado_id' => $empleado->id]) }}" class="btn btn-secondary btn-sm back-btn">Regresar a Horas Trabajadas</a>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
