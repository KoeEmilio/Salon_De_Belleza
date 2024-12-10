<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnos de Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

        h3 {
            color: #ff69b4; 
            text-align: center;
        }

        .btn {
            border-radius: 5px;
        }

        .btn-success {
            background-color: #000;
            border-color: #000;
            color: #ff69b4;
        }

        .btn-success i {
            color: #ff69b4;
        }

        .btn-secondary {
            background-color: #ff69b4;
            border-color: #ff69b4;
        }

        .btn-warning {
            background-color: #000;
            border-color: #000;
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
            h3 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3>Turnos Asignados</h3>

        <a href="{{ route('turnos.create', ['employee_id' => $employee_id]) }}" class="btn btn-success mb-3">
            Agregar Turno
        </a>

        <a href="{{ route('turnos.index', ['employee_id' => $employee_id]) }}" class="btn btn-secondary mb-3">
            Regresar
        </a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Día</th>
                    <th>Turno</th>
                    <th>Hora de Entrada</th>
                    <th>Hora de Salida</th>
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($turnos as $turno)
                    <tr>
                        <td>{{ $turno->day }}</td>
                        <td>{{ $turno->shift->shift }}</td> 
                        <td>{{ $turno->shift->entry_time }}</td> 
                        <td>{{ $turno->shift->exit_time }}</td>
                        <td>
                            <a href="{{ route('turnos.edit', ['id' => $turno->id]) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
