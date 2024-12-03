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
        }

        h5 {
            color: #333;
            margin-bottom: 20px;
        }

        .table th {
            background-color: #000;
            color: #ff69b4;
            text-align: center;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
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

        .btn-action {
            background-color: #000;
            color: #ff69b4;
            border: none;
        }

        .btn-action:hover {
            background-color: #333;
            color: #ff69b4;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-danger {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <!-- Barra Superior -->
    <div class="navbar">
        <h1>Bonos e Impuestos de <span class="text-light">{{ $empleado->name }}</span></h1>
    </div>

    <div class="container">
      

        <h5 class="text-center mb-4">Periodo: {{ $nomina->period_start }} - {{ $nomina->period_end }}</h5>

        <!-- Botón de Agregar -->
        <div class="text-center mb-4">
            <a href="{{ route('bonos.impuestos.create', ['employee_id' => $empleado->id, 'nomina_id' => $nomina->id]) }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Agregar Bono/Impuesto
            </a>
        </div>

          <!-- Botón de Regresar -->
          <a href="{{ route('nominas.index', ['empleado_id' => $empleado->id]) }}" class="btn btn-secondary btn-sm mb-3">
            <i class="fas fa-arrow-left"></i> Regresar a Nóminas
        </a>
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
                                <span class="badge {{ $item->type == 'Bono' ? 'badge-success' : 'badge-danger' }}">
                                    {{ $item->type }}
                                </span>
                            </td>
                            <td>
                                <!-- Editar -->
                                <a href="{{ route('bonos.impuestos.edit', ['employee_id' => $empleado->id, 'nomina_id' => $nomina->id, 'id' => $item->id]) }}" 
                                   class="btn btn-action btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <!-- Eliminar -->
                                <form action="{{ route('bonos.impuestos.destroy', ['employee_id' => $empleado->id, 'nomina_id' => $nomina->id, 'id' => $item->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este bono/impuesto?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-action btn-sm">
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
