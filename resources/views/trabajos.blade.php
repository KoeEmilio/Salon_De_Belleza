<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas Trabajadas por Empleado</title>
    <!-- Estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para los iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
        }
        .container {
            margin-top: 50px;
        }
        /* Barra superior */
        .navbar {
            background-color: #000000; /* Fondo negro */
            color: #FF66B2; /* Rosa suave */
            padding: 20px; /* Aumento el padding para hacer la barra más grande */
        }
        .navbar h1 {
            color: #FF66B2; /* Título en rosa suave */
            margin: 0;
            text-align: center; /* Centrado del título */
            font-size: 2rem; /* Tamaño de fuente más grande */
        }
        table {
            margin-top: 22px;
            width: 100%;
            display: table;
            border-collapse: collapse;
            background-color: #000000; /* Fondo de la tabla negro */
        }
        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
            color: #FF66B2; /* Letras rosas */
        }
        th {
            background-color: #343a40;
        }
        td {
            background-color: #000000;
        }
        tr:nth-child(even) {
            background-color: #222222; /* Fondo ligeramente más claro para las filas pares */
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
        .action-buttons a i {
            margin-right: 8px; /* Espacio entre el ícono y el texto */
        }
        .message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
        }
        .back-button {
            margin-top: 20px;
        }
        @media (max-width: 768px) {
            .navbar h1 {
                font-size: 1.5rem;
            }
            table {
                font-size: 0.875rem;
            }
            .action-buttons a {
                font-size: 0.75rem;
                padding: 4px 12px;
            }
        }
    </style>
</head>
<body>

<!-- Barra superior -->
<div class="navbar navbar-expand-md text-center">
    <h1>Horas Trabajadas por Empleado</h1>
</div>

<div class="container">
    <!-- Botón para ir atrás -->
    <div class="back-button text-center">
        <a href="javascript:history.back()" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver Atrás
        </a>
    </div>

    <!-- Verificación si no hay datos -->
    <div>
        @if($employeeHours->isEmpty())
            </div>
        @endif
    </div>
    
    <!-- Tabla visible siempre, aunque no haya datos -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><i class="fas fa-user"></i> Empleado</th>
                    <th><i class="fas fa-calendar-alt"></i> Fecha</th>
                    <th><i class="fas fa-clock"></i> Hora de Entrada</th>
                    <th><i class="fas fa-clock"></i> Hora de Salida</th>
                    <th><i class="fas fa-hourglass-half"></i> Horas Trabajadas</th>
                    <th><i class="fas fa-hourglass-end"></i> Horas Extra</th>
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
</div>

<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
