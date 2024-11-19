<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: #f4f4f4;
            overflow-x: hidden;
        }

        .fondo_personalizado {
            background-color: #212121;
        }

        .navbar-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .custom-color-text {
            color: #ffb7c2;
        }

        .custom-icon-size {
            font-size: 48px;
        }

        .custom-icon-color {
            color: #ffb7c2;
        }

        .logout-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
        }

        nav h1 {
            color: #ffb7c2;
        }

        .principal {
            height: calc(100vh - 56px);
            display: flex;
            overflow: hidden;
        }

        .container {
            height: 100%;
            width: 100%;
            padding: 20px;
            overflow-y: auto;
        }

        .table {
            width: 100%;
            table-layout: fixed;
        }

        td,
        th {
            padding: 10px;
            text-align: center;
        }

        .card-header {
            background-color: #000000;
            color: #ffb7c2;
            text-align: center;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }

        .btn-custom {
            background-color: #000000;
            color: #ffb7c2;
            border: 2px solid #ffb7c2;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #ffb7c2;
            color: #000000;
        }

        .btn-container {
            padding: 12px 25px;
            border-radius: 15px;
            background: #212121;
            color: #e8e8e8;
            font-weight: bold;
            transition: all 250ms;
            box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
        }

        .btn-container:hover {
            background: #ffb7c2;
            color: #212121;
        }

        .btn-container + .btn-container {
            margin-left: 10px;
        }

        .pagination {
            justify-content: center;
        }

        .pagination .page-link {
            border-radius: 50%;
            margin: 0 5px;
        }

        .pagination .page-item.active .page-link {
            background-color: #ffb7c2;
            border-color: #ffb7c2;
        }

        /* Eliminar barra que sale al lado de la tabla */
        .table-container {
            overflow-x: hidden;
        }

        /* Ajustar los botones de acción para que no estén amontonados */
        .action-buttons {
            display: flex;
            gap: 15px; /* Espaciado entre botones */
            justify-content: flex-start;
            flex-wrap: wrap; /* Asegura que los botones no se desborden si no hay suficiente espacio */
        }

        /* Agregar responsividad */
        @media (max-width: 768px) {
            .navbar-center {
                position: static;
                transform: none;
                text-align: center;
                width: 100%;
            }

            .table td,
            .table th {
                font-size: 14px;
                padding: 8px;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .pagination {
                font-size: 12px;
            }

            .card-header h3 {
                font-size: 18px;
            }
        }

        @media (max-width: 576px) {
            .btn-container {
                padding: 10px 20px;
                font-size: 14px;
            }

            .navbar-center h1 {
                font-size: 20px;
            }

            .principal {
                height: auto;
            }

            .container {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fondo_personalizado">
            <div class="navbar-center">
                <h1>EMPLEADOS</h1>
            </div>
            <div class="ml-auto">
                <a href="{{ route('dashboard') }}" class="btn logout-button">
                    <i class='bx bxs-home custom-icon-size custom-icon-color'></i>
                    <span class="custom-color-text">Inicio</span>
                </a>
            </div>
        </nav>
    </div>

    <div class="principal">
        <div class="container">
            <!-- Card con la tabla -->
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="my-0">Lista de Trabajadores</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-container">
                        <table class="table table-hover table-striped m-0">
                            <thead class="table-light">
                                <tr>
                                    <th><i class="bx bx-id-card"></i> ID</th>
                                    <th><i class="bx bx-user"></i> Nombre</th>
                                    <th><i class="bx bx-envelope"></i> Email</th>
                                    <th><i class="bx bx-shield"></i> Roles</th>
                                    <th><i class="bx bx-cog"></i> Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($empleados as $empleado)
                                <tr>
                                    <td>{{ $empleado->id }}</td>
                                    <td>{{ $empleado->name }}</td>
                                    <td>{{ $empleado->email }}</td>
                                    <td>
                                        @foreach($empleado->roles as $role)
                                        {{ $role->rol }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('nominas') }}" class="btn-container">Nominas</a>
                                            <a href="{{ route('turnos') }}" class="btn-container">Turnos</a>
                                            <a href="{{ route('trabajos') }}" class="btn-container">Trabajos</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No hay usuarios disponibles</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Paginación debajo de la tabla -->
            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <!-- Páginas anteriores -->
                        @if ($empleados->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Anterior</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $empleados->previousPageUrl() }}" aria-label="Previous">
                                <i class="fas fa-arrow-left"></i> Anterior
                            </a>
                        </li>
                        @endif

                        <!-- Páginas numeradas -->
                        @foreach ($empleados->getUrlRange(1, $empleados->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $empleados->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endforeach

                        <!-- Páginas siguientes -->
                        @if ($empleados->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $empleados->nextPageUrl() }}" aria-label="Next">
                                Siguiente <i class="fas fa-arrow-right"></i>
                            </a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link">Siguiente</span>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>

</html>
