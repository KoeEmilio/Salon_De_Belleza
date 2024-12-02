<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnos de Empleado</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>Turnos Asignados</h3>

        <!-- Botón para agregar un nuevo turno -->
        <a href="{{ route('turnos.create', ['employee_id' => $employee_id]) }}" class="btn btn-success mb-3">Agregar Turno</a>

        <!-- Botón para regresar al listado de turnos -->
        <a href="{{ route('turnos.index', ['employee_id' => $employee_id]) }}" class="btn btn-secondary mb-3">Regresar</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Día</th>
                    <th>Turno</th>
                    <th>Hora de Entrada</th>
                    <th>Hora de Salida</th>
                    <th>Acciones</th> <!-- Columna para editar y eliminar -->
                </tr>
            </thead>
            <tbody>
                @foreach($turnos as $turno)
                    <tr>
                        <td>{{ $turno->day }}</td>
                        <td>{{ $turno->shift->shift }}</td> <!-- Nombre del turno -->
                        <td>{{ $turno->shift->entry_time }}</td> <!-- Hora de entrada -->
                        <td>{{ $turno->shift->exit_time }}</td> <!-- Hora de salida -->

                        <!-- Botón para editar el turno -->
                        <td>
                            <a href="{{ route('turnos.edit', ['id' => $turno->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
