<!-- turnos.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnos de {{ $empleado->name}}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .container {
            margin-top: 20px;
        }

        .card-header {
            background-color: #000;
            color: #fff;
            text-align: center;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Turnos de {{ $empleado->name}} </h3>
            </div>
            <div class="card-body">
                <table class="table">
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
                                    <a href="{{ route('turnos.editar', ['turno_id' => $turno->id]) }}" class="btn btn-warning">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
             
            </div>
        </div>
    </div>
</body>

</html>
