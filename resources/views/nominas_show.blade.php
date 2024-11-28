<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Nómina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
            max-width: 900px;
        }

        h1, h2 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #e9ecef;
        }

        .icon-header {
            margin-right: 10px;
            color: #007bff;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .btn-back {
            margin-top: 20px;
            display: inline-block;
            background-color: #6c757d;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        /* Responsividad */
        @media (max-width: 768px) {
            h1, h2 {
                text-align: center;
                font-size: 1.5rem;
            }

            .btn-back {
                width: 100%;
                text-align: center;
            }

            th, td {
                padding: 8px;
            }
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>
            <i class="fas fa-file-invoice-dollar icon-header"></i>
            Detalles de la Nómina para <span class="text-success">{{ $empleado->name }}</span>
        </h1>

        <!-- Mostrar información de la nómina -->
        <p><strong><i class="fas fa-calendar-alt"></i> Periodo:</strong> {{ $nomina->period_start }} - {{ $nomina->period_end }}</p>
        <p><strong><i class="fas fa-money-bill-wave"></i> Sueldo Neto:</strong> ${{ $nomina->net_salary }}</p>
        <p><strong><i class="fas fa-info-circle"></i> Estado del Pago:</strong> {{ $nomina->payment_status }}</p>

        <!-- Resumen de la nómina -->
        <h2>
            <i class="fas fa-chart-line icon-header"></i>
            Resumen
        </h2>
        <p><strong>Total Pagado:</strong> ${{ $resumen['total_pagado'] }}</p>
        <p><strong>Nóminas Pendientes:</strong> {{ $resumen['pendientes'] }}</p>

        <!-- Mostrar horas trabajadas -->
        <h2>
            <i class="fas fa-clock icon-header"></i>
            Horas Trabajadas
        </h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora de Entrada</th>
                        <th>Hora de Salida</th>
                        <th>Horas Trabajadas</th>
                        <th>Horas Extra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employeeHours as $hours)
                        <tr>
                            <td>{{ $hours->date_worked }}</td>
                            <td>{{ $hours->start_time }}</td>
                            <td>{{ $hours->end_time }}</td>
                            <td>{{ $hours->total_hours_worked }}</td>
                            <td>{{ $hours->overtime_hours }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Mostrar bonos e impuestos -->
        <h2>
            <i class="fas fa-gift icon-header"></i>
            Bonos e Impuestos
        </h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bonusesAndTaxes as $item)
                        <tr>
                            <td>{{ $item->date_recorded }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->description }}</td>
                            <td>${{ $item->amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Botón para regresar -->
        <a href="{{ route('nominas.index', ['empleado_id' => $empleado->id]) }}" class="btn btn-secondary btn-sm back-btn">Regresar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
