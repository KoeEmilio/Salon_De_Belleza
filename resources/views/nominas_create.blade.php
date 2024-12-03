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
            max-width: 800px;
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            border: 2px solid #000;
        }

        label {
            font-weight: bold;
            color: #000;
        }

        input, select {
            border: 1px solid #000;
        }

        input:focus, select:focus {
            border-color: #ff69b4;
            outline: none;
        }

        .btn {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #000;
            color: #ff69b4;
            border: none;
        }

        .btn-primary:hover {
            background-color: #333;
        }

        .btn-secondary {
            background-color: #ff69b4;
            color: #fff;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #e052a0;
        }
    </style>
</head>
<body>
    <!-- Barra Superior -->
    <div class="navbar">
        <h1>Crear Nómina para <span class="text-light">{{ $empleado->name }}</span></h1>
    </div>

    <div class="container">
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

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Crear Nómina
                </button>
                <a href="{{ route('nominas.index', ['empleado_id' => $empleado->id]) }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Regresar
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
