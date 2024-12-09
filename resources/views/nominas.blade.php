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
        }

        .btn-back {
            background-color: #ff69b4; 
            color: #fff;
            border: none;
        }

        .btn-back:hover {
            background-color: #e052a0;
        }

        .btn-add {
            background-color: #000;
            color: #ff69b4; 
            border: none;
            margin-bottom: 20px;
        }

        .btn-add:hover {
            background-color: #333;
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

        .btn-detail {
            background-color: #000;
            color: #ff69b4;
            border: none;
        }

        .btn-detail:hover {
            background-color: #333;
        }

        .btn {
            border-radius: 5px;
        }

        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }

            .btn {
                margin: 5px 0;
                width: 100%;
            }

            .navbar h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Nóminas de {{ $empleado->name }}</h1>
    </div>

    <div class="container">
<form method="GET" action="{{ route('nominas.index', ['empleado_id' => $empleado->id]) }}" class="mb-4 p-3" style="border: 1px solid #000; border-radius: 8px; background-color: #fff;">
    <div class="row">
        <div class="col-md-4">
            <label for="period_start" class="form-label" style="color: #000; font-weight: bold;">
                <i class="fas fa-calendar-alt"></i> Periodo (Inicio)
            </label>
            <input type="date" id="period_start" name="period_start" class="form-control" value="{{ request()->get('period_start') }}" style="border-color: #000;">
        </div>
        <div class="col-md-4">
            <label for="period_end" class="form-label" style="color: #000; font-weight: bold;">
                <i class="fas fa-calendar-alt"></i> Periodo (Fin)
            </label>
            <input type="date" id="period_end" name="period_end" class="form-control" value="{{ request()->get('period_end') }}" style="border-color: #000;">
        </div>
        <div class="col-md-4">
            <label for="payment_status" class="form-label" style="color: #000; font-weight: bold;">
                <i class="fas fa-check-circle"></i> Estado de Pago
            </label>
            <select id="payment_status" name="payment_status" class="form-control" style="border-color: #000;">
                <option value="">Todos</option>
                <option value="Pagado" {{ request()->get('payment_status') == 'Pagado' ? 'selected' : '' }}>Pagado</option>
                <option value="Pendiente" {{ request()->get('payment_status') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            </select>
        </div>
    </div>
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-add">
            <i class="fas fa-search"></i> Filtrar
        </button>
    </div>
</form>
         <a href="{{ route('empleados', ['empleado_id' => $empleado->id]) }}" class="btn btn-back mb-3">
            <i class="fas fa-arrow-left"></i> Regresar
        </a>
        <a href="{{ route('nominas.create', ['empleado_id' => $empleado->id]) }}" class="btn btn-add">
            <i class="fas fa-plus"></i> Crear Nómina
        </a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><i class="fas fa-calendar-alt"></i> Periodo</th>
                        <th><i class="fas fa-clock"></i> Horas Trabajadas</th>
                        <th><i class="fas fa-stopwatch"></i> Horas Extras</th>
                        <th><i class="fas fa-gift"></i> Bonos</th>
                        <th><i class="fas fa-percentage"></i> Impuestos</th>
                        <th><i class="fas fa-wallet"></i> Pago Total</th>                    
                        <th><i class="fas fa-check-circle"></i> Estado</th>
                        <th><i class="fas fa-tools"></i> Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nominas as $nomina)
                        <tr>
                            <td>{{ $nomina->period_start }} - {{ $nomina->period_end }}</td>
                            <td>{{ $nomina->total_hours_worked }} horas</td>
                            <td>{{ $nomina->overtime_hours }} horas</td>
                            <td>${{ number_format($nomina->bonuses, 2) }} MXN</td>
                            <td>${{ number_format($nomina->tax, 2) }} MXN</td>
                            <td>${{ number_format($nomina->net_salary, 2) }} MXN</td>
                            <td>
                                <span class="badge {{ $nomina->payment_status == 'Pagado' ? 'bg-success' : 'bg-warning' }}">
                                    {{ $nomina->payment_status }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center flex-wrap">
                                    <a href="{{ route('bonos.impuestos', ['employee_id' => $empleado->id, 'nomina_id' => $nomina->id]) }}" 
                                        class="btn btn-detail btn-sm m-1">
                                        <i class="fas fa-gift"></i> 
                                    </a>
                                    <a href="{{ route('horas_trabajadas.index', ['nomina_id' => $nomina->id]) }}" 
                                        class="btn btn-detail btn-sm m-1">
                                        <i class="fas fa-clock"></i> 
                                    </a>
                                    <a href="{{ route('nominas.edit', ['empleado_id' => $empleado->id, 'nomina_id' => $nomina->id]) }}" 
                                        class="btn btn-detail btn-sm m-1">
                                        <i class="fas fa-edit"></i> 
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
