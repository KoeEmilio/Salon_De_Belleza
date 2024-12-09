<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas Trabajadas - {{ $empleado->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
        }

        h1, h5 {
            color: #ff69b4;
            text-align: center;
        }

        .table th {
            background-color: #000;
            color: #ff69b4; 
            text-align: center;
        }

        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .btn {
            border-radius: 5px;
        }

        .btn-secondary {
            background-color: #ff69b4;
            border-color: #ff69b4;
        }

        .btn-warning, .btn-danger {
            background-color: #000;
            border-color: #000;
            color: #ff69b4;
        }

        .btn-warning i, .btn-danger i {
            color: #ff69b4;
        }

        .btn-add {
            background-color: #000;
            border-color: #000;
            color: #ff69b4;
        }

        .btn-add i {
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
        <h1>Horas Trabajadas de {{ $empleado->name }}</h1>
    </div>

    <div class="container">

        
        <h5 class="mb-4">Periodo: {{ $nomina->period_start }} - {{ $nomina->period_end }}</h5>

        <div class="text-center mb-4">
            <a href="{{ route('horas_trabajadas.create', ['nomina_id' => $nomina->id, 'empleado_id' => $empleado->id]) }}" class="btn btn-add btn-sm">
                <i class="fas fa-plus-circle"></i> Agregar Horas Trabajadas
            </a>
        </div>
        <a href="{{ route('nominas.index', ['empleado_id' => $empleado->id]) }}"
             class="btn btn-secondary btn-sm back-btn">Regresar a Nóminas</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora de Entrada</th>
                        <th>Hora de Salida</th>
                        <th>Horas Trabajadas</th>
                        <th>Horas Extras</th> 
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($horasTrabajadas as $hora)
                        <tr>
                            <td>{{ $hora->date_worked }}</td>
                            <td>{{ $hora->start_time }}</td>
                            <td>{{ $hora->end_time }}</td>
                            <td>{{ $hora->hours_worked }} horas</td>
                            <td>{{ $hora->overtime_hours }} horas</td> 
                            <td>
                                <a href="{{ route('horas_trabajadas.edit', ['nomina_id' => $nomina->id, 'empleado_id' => $empleado->id, 'id' => $hora->id]) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>

                                <form action="{{ route('horas_trabajadas.destroy', ['nomina_id' => $nomina->id, 'empleado_id' => $empleado->id, 'id' => $hora->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta entrada de horas trabajadas?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No se han registrado horas trabajadas para este periodo.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
