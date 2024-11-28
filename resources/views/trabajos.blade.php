<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas Trabajadas por Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
        }
        .container {
            margin-top: 50px;
        }
        .navbar {
            background-color: #000000;
            color: #FF66B2;
            padding: 20px;
        }
        .navbar h1 {
            color: #FF66B2;
            margin: 0;
            text-align: center;
            font-size: 2rem;
        }
        table {
            margin-top: 22px;
            width: 100%;
            border-collapse: collapse;
            background-color: #000000;
        }
        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
            color: #FF66B2;
        }
        th {
            background-color: #343a40;
        }
        td {
            background-color: #000000;
        }
        tr:nth-child(even) {
            background-color: #222222;
        }
        .action-buttons a {
            text-decoration: none;
            margin: 5px;
            padding: 5px 15px;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
        }
        .action-buttons a:hover {
            background-color: #0056b3;
        }
        .back-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="navbar navbar-expand-md text-center">
    <h3>Trabajos de {{ $empleado->name }}</h3> <!-- Usar $empleado porque es el que pasas desde el controlador -->
</div>

<div class="container">
    <div class="back-button text-center">
        <a href="javascript:history.back()" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver Atrás
        </a>
    </div>

    @if($employeeHours->isEmpty())
        <div class="alert alert-warning text-center">
            No hay registros de horas trabajadas para este empleado.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Empleado</th>
                        <th>Fecha</th>
                        <th>Hora de Entrada</th>
                        <th>Hora de Salida</th>
                        <th>Horas Trabajadas</th>
                        <th>Horas Extra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employeeHours as $employeeHour)
                        <tr>
                            <td>{{ $employeeHour->employee->person->name }} {{ $employeeHour->employee->person->last_name }}</td>
                            <td>{{ $employeeHour->date_worked }}</td>
                            <td>{{ $employeeHour->start_time }}</td>
                            <td>{{ $employeeHour->end_time }}</td>
                            <td>{{ $employeeHour->hours_worked }}</td>
                            <td>{{ $employeeHour->overtime_hours }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
