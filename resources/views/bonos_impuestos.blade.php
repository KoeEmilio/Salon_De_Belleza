<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonos e Impuestos de {{ $empleado->name }}</title>
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
        .table th {
            background-color: #000;
            color: #ff69b4;
            text-align: center;
        }
        .table td {
            text-align: center;
        }
        .btn-back {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 15px;
        }
        .btn {
            margin-bottom: 10px;
        }
        @media (max-width: 768px) {
            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <a href="{{ route('nominas.index', ['empleado_id' => $empleado->id]) }}" class="btn btn-secondary btn-sm btn-back">
        <i class="fas fa-arrow-left"></i> Regresar a Nóminas
    </a>

    <h1 class="text-center mb-4">Bonos e Impuestos de {{ $empleado->name }}</h1>
    <h5 class="text-center mb-4">Periodo: {{ $nomina->period_start }} - {{ $nomina->period_end }}</h5>

    <!-- Botones de Acción -->
    <div class="text-center mb-4">
        <a href="{{ route('bonos.impuestos.create', ['employee_id' => $empleado->id, 'nomina_id' => $nomina->id]) }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Agregar Bono/Impuesto
        </a>
    </div>

    <!-- Tabla de Bonos e Impuestos -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Fecha Registrada</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($bonosImpuestos as $item)
                <tr>
                    <td>{{ $item->date_recorded }}</td>
                    <td>{{ $item->description }}</td>
                    <td>${{ number_format($item->amount, 2) }} MXN</td>
                    <td>
                        <span class="badge {{ $item->type == 'Bono' ? 'bg-success' : 'bg-danger' }}">
                            {{ $item->type }}
                        </span>
                    </td>
                    <td>
                        <!-- Editar -->
                        <a href="{{ route('bonos.impuestos.edit', ['employee_id' => $empleado->id, 'nomina_id' => $nomina->id, 'id' => $item->id]) }}" 
                           class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <!-- Eliminar -->
                        <form action="{{ route('bonos.impuestos.destroy', ['employee_id' => $empleado->id, 'nomina_id' => $nomina->id, 'id' => $item->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este bono/impuesto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No se encontraron registros de bonos o impuestos para este periodo.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
