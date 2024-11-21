<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Nóminas</title>
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
    <h1>Lista de Nóminas</h1>
</div>

<div class="container">
    <!-- Botón para ir atrás -->
    <div class="back-button text-center">
        <a href="javascript:history.back()" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver Atrás
        </a>
    </div>
    
    <!-- Verificación si no hay datos -->
    <div >
        @if($payrolls->isEmpty())
        @endif
    </div>
    
    <!-- Tabla visible siempre, aunque no haya datos -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><i class="fas fa-user"></i> Empleado</th>
                    <th><i class="fas fa-calendar-alt"></i> Periodo</th>
                    <th><i class="fas fa-clock"></i> Horas Trabajadas</th>
                    <th><i class="fas fa-clock"></i> Horas Extras</th>
                    <th><i class="fas fa-gift"></i> Bonificaciones</th>
                    <th><i class="fas fa-percent"></i> Impuestos</th>
                    <th><i class="fas fa-dollar-sign"></i> Salario Neto</th>
                    <th><i class="fas fa-check-circle"></i> Estado de Pago</th>
                    <th><i class="fas fa-cogs"></i> Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($payrolls as $payroll)
                    <tr>
                        <td>{{ $payroll->employee->person->name }} {{ $payroll->employee->person->last_name }}</td>
                        <td>{{ $payroll->period_start }} - {{ $payroll->period_end }}</td>
                        <td>{{ $payroll->total_hours_worked }}</td>
                        <td>{{ $payroll->overtime_hours }}</td>
                        <td>{{ $payroll->bonuses }}</td>
                        <td>{{ $payroll->tax }}</td>
                        <td>{{ $payroll->net_salary }}</td>
                        <td>{{ $payroll->payment_status }}</td>
                        <td class="action-buttons">
                            @if($payroll->payment_status === 'Pendiente')
                                <a href="{{ route('nominas.markPaid', $payroll->id) }}" class="btn btn-success">
                                    <i class="fas fa-check-circle"></i> Marcar como Pagado
                                </a>
                            @endif
                            <a href="{{ route('nominas.show', $payroll->id) }}" class="btn btn-info">
                                <i class="fas fa-eye"></i> Ver Detalles
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center" style="color: #FF66B2;">No hay registros de nómina disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
