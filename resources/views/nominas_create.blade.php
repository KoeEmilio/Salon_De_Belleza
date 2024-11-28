<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nómina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
            max-width: 800px;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn {
            border-radius: 5px;
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }

            h1 {
                font-size: 1.5rem;
                text-align: center;
            }

            .btn {
                width: 100%;
                margin-top: 10px;
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
            <i class="fas fa-plus-circle text-primary"></i>
            Crear Nómina para <span class="text-success">{{ $empleado->name }}</span>
        </h1>

        <form action="{{ route('nominas.store', $empleado->id) }}" method="POST">
            @csrf
            <input type="hidden" name="employee_id" value="{{ $empleado->id }}">

            <div class="mb-3">
                <label for="period_start" class="form-label">
                    <i class="fas fa-calendar-alt"></i> Periodo de Inicio
                </label>
                <input type="date" class="form-control" id="period_start" name="period_start" required>
            </div>

            <div class="mb-3">
                <label for="period_end" class="form-label">
                    <i class="fas fa-calendar-alt"></i> Periodo de Fin
                </label>
                <input type="date" class="form-control" id="period_end" name="period_end" required>
            </div>

            <div class="mb-3">
                <label for="total_hours_worked" class="form-label">
                    <i class="fas fa-clock"></i> Horas Trabajadas
                </label>
                <input type="number" class="form-control" id="total_hours_worked" name="total_hours_worked" required>
            </div>

            <div class="mb-3">
                <label for="overtime_hours" class="form-label">
                    <i class="fas fa-clock"></i> Horas Extras
                </label>
                <input type="number" class="form-control" id="overtime_hours" name="overtime_hours" required>
            </div>

            <div class="mb-3">
                <label for="bonuses" class="form-label">
                    <i class="fas fa-gift"></i> Bonos
                </label>
                <input type="number" class="form-control" id="bonuses" name="bonuses" required>
            </div>

            <div class="mb-3">
                <label for="tax" class="form-label">
                    <i class="fas fa-percent"></i> Impuestos
                </label>
                <input type="number" class="form-control" id="tax" name="tax" required>
            </div>

            <div class="mb-3">
                <label for="net_salary" class="form-label">
                    <i class="fas fa-money-bill-wave"></i> Salario Neto
                </label>
                <input type="number" class="form-control" id="net_salary" name="net_salary" required>
            </div>

            <div class="mb-3">
                <label for="payment_status" class="form-label">
                    <i class="fas fa-info-circle"></i> Estado de Pago
                </label>
                <select class="form-control" id="payment_status" name="payment_status">
                    <option value="Pendiente">Pendiente</option>
                    <option value="Pagado">Pagado</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Crear Nómina
            </button>
            <a href="{{ route('nominas.index', ['empleado_id' => $empleado->id]) }}" class="btn btn-secondary btn-sm back-btn">Regresar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
