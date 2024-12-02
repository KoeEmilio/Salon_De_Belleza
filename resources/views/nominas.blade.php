<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nóminas de {{ $empleado->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #000;
            color: #ff69b4; /* Texto rosa */
            text-align: center;
        }

        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .btn {
            border-radius: 5px;
        }

        .btn-back {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 15px;
        }

        /* Responsividad */
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
                text-align: center;
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
<div class="container">
    <a href="{{ route('empleados', ['empleado_id' => $empleado->id]) }}" class="btn btn-secondary btn-sm back-btn">Regresar</a>

    <h1 class="mb-4 text-center">Nóminas de {{ $empleado->name }}</h1>

    <!-- Formulario de Filtros -->
    <form method="GET" action="{{ route('nominas.index', ['empleado_id' => $empleado->id]) }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="period_start" class="form-label">Periodo (Inicio)</label>
                <input type="date" id="period_start" name="period_start" class="form-control" value="{{ request()->get('period_start') }}">
            </div>
            <div class="col-md-4">
                <label for="period_end" class="form-label">Periodo (Fin)</label>
                <input type="date" id="period_end" name="period_end" class="form-control" value="{{ request()->get('period_end') }}">
            </div>
            <div class="col-md-4">
                <label for="payment_status" class="form-label">Estado de Pago</label>
                <select id="payment_status" name="payment_status" class="form-control">
                    <option value="">Todos</option>
                    <option value="Pagado" {{ request()->get('payment_status') == 'Pagado' ? 'selected' : '' }}>Pagado</option>
                    <option value="Pendiente" {{ request()->get('payment_status') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Filtrar</button>
    </form>

    <!-- Botón de Crear Nómina -->
    <div class="text-center mb-4">
        <a href="{{ route('nominas.create', ['empleado_id' => $empleado->id]) }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear Nómina para {{ $empleado->name }}
        </a>
    </div>


    <!-- Tabla de Nóminas -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Periodo</th>
                <th>Horas Trabajadas</th>
                <th>Horas Extras</th>
                <th>Bonos</th>
                <th>Impuestos</th>
                <th>Salario Neto</th>
                <th>Pago Total</th>
                <th>Estado</th>
                <th>Detalles de la Nomina</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($nominas as $index => $nomina)
                @php
                    // Obtener el total de los pagos adicionales de la tabla payroll_payments
                    $totalPayments = $nomina->payrollPayments->sum('payment_amount');
                @endphp
                <tr>
                    <td>{{ $nomina->period_start }} - {{ $nomina->period_end }}</td>
                    <td>{{ $nomina->total_hours_worked }} horas</td>
                    <td>{{ $nomina->overtime_hours }} horas</td>
                    <td>${{ number_format($nomina->bonuses, 2) }} MXN</td>
                    <td>${{ number_format($nomina->tax, 2) }} MXN</td>
                    <td>${{ number_format($nomina->net_salary, 2) }} MXN</td>
                    <td>${{ number_format($totalPayments, 2) }} MXN</td>
                    <td>
                        <span class="badge {{ $nomina->payment_status == 'Pagado' ? 'bg-success' : 'bg-warning' }}">
                            {{ $nomina->payment_status }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center flex-wrap">
                            <!-- Botón para ver bonos e impuestos -->
                            <a href="{{ route('bonos.impuestos', ['employee_id' => $empleado->id, 'nomina_id' => $nomina->id]) }}" 
                                class="btn btn-warning btn-sm m-1 d-flex align-items-center justify-content-center">
                                 <i class="fas fa-gift me-2"></i> Ver Bonos/Impuestos
                             </a>
                             
                             
                             
                            <!-- Botón para ver horas trabajadas -->
                            <a href="{{ route('horas_trabajadas.index', ['nomina_id' => $nomina->id]) }}" class="btn btn-secondary btn-sm m-1 d-flex align-items-center justify-content-center">
                                <i class="fas fa-clock me-2"></i> Horas Trabajadas 
                            </a>
                            
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No hay nóminas registradas para este empleado.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
