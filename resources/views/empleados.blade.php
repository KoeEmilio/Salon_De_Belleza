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

        .navbar {
            background-color: black;
            height: 80px;
        }

        .navbar-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            color: #ffb7c2;
        }

        .navbar-center h1 {
            font-size: 36px;
            font-weight: bold;
        }

        .ml-auto {
            margin-left: auto;
        }

        .logout-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
        }

        .principal {
            height: calc(100vh - 80px);
            display: flex;
            overflow: hidden;
            padding-top: 20px;
        }

        .container {
            height: 100%;
            width: 100%;
            padding: 20px;
            overflow-y: auto;
        }

        .card {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: black;
            color: #ffb7c2;
            text-align: center;
            padding: 15px;
        }

        .table {
            width: 100%;
            table-layout: fixed;
        }

        td,
        th {
            padding: 10px;
            text-align: center;
            word-wrap: break-word;
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
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-custom:hover {
            background-color: #ffb7c2;
            color: #000000;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: flex-start;
            flex-wrap: wrap;
        }

        .action-buttons a {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .action-buttons .btn-custom {
            padding: 10px 20px;
            font-size: 16px;
        }

        .pagination {
            justify-content: center;
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
        .pagination .page-link {
            border-radius: 50%;
            margin: 0 5px;
        }

        .pagination .page-item.active .page-link {
            background-color: #ffb7c2;
            border-color: #ffb7c2;
        }

        @media (max-width: 1024px) {
            .navbar-center h1 {
                font-size: 28px;
            }

            .table th, 
            .table td {
                font-size: 14px;
            }

            .btn-custom {
                padding: 8px 15px;
                font-size: 14px;
            }
        }

        @media (max-width: 768px) {
            .navbar-center {
                position: static;
                transform: none;
                text-align: center;
                width: 100%;
            }

            .table th, 
            .table td {
                font-size: 12px;
                padding: 5px;
            }

            .btn-custom {
                padding: 6px 10px;
                font-size: 12px;
            }

            .action-buttons {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .pagination .page-link {
                font-size: 12px;
            }
        }

        @media (max-width: 576px) {
            .navbar-center h1 {
                font-size: 20px;
            }

            .container {
                padding: 10px;
            }

            .principal {
                height: auto;
            }

            .btn-custom {
                padding: 5px 10px;
                font-size: 10px;
            }

            .home{
                display: flex;
                position: absolute;
                margin-bottom: 140px;
            }
        }
    </style>
</head>

<body>
    <div class="contenedor">

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-center">
                <h1>EMPLEADOS</h1>
            </div>
            <div id="home" class="d-flex align-items-center">
                <a href="{{ route('dashboard') }}" class="btn logout-button">
                    <i class='bx bxs-home custom-icon-size custom-icon-color'></i>
                    <span class="custom-color-text">Inicio</span>
                </a>
            </div>
        </nav>
    </div>

    <div class="principal">
        <div class="container">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="my-0">Lista de Trabajadores</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped m-0">
                            <thead class="table-light">
                                <tr>
                                    <th><i class="bx bx-user"></i> Nombre</th>
                                    <th><i class="bx bx-envelope"></i> Email</th>
                                    <th><i class="bx bx-shield"></i> Roles</th>
                                    <th><i class="bx bx-cog"></i> Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($empleados as $empleado)
                                <tr>
                                    <td>{{ $empleado->name }}</td>
                                    <td>{{ $empleado->email }}</td>
                                    <td>
                                        @foreach($empleado->roles as $role)
                                        {{ $role->rol }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('nominas.index', ['empleado_id' => $empleado->id]) }}" class="btn-custom">
                                                <i class='bx bx-wallet'></i> Nóminas
                                            </a>
                                           
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

            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
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
                        @foreach ($empleados->getUrlRange(1, $empleados->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $empleados->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endforeach
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
