<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: #CFCFCF;
        }
        .text-decoration-none {
            text-decoration: none;
        }
        .fondo_personalizado {
            background-color: #000000;
        }
        .navbar-center {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
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
            margin: 0 auto;
            color: #ffb7c2;
        }
        .principal {
            height: calc(100vh - 105px);
            display: flex;
            padding-top: 60px;
        }
        .container {
            height: 100%;
            flex-grow: 1;
        }
        .container-2 {
            height: 100%;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card{
            height: 75%;
        }

        .card-header {
            background-color: #000000;
            color: #ffb7c2;
            text-align: center;
        }
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table-container {
            overflow-x: auto; 
            overflow-x: auto; 
        }

        .editBtn {
            width: 50px;
            height: 50px;
            border-radius: 20px;
            border: none;
            background-color: rgb(93, 93, 116);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.123);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
        }
        .editBtn::before {
            content: "";
            width: 200%;
            height: 200%;
            background-color: #ffb7c2;
            position: absolute;
            z-index: 1;
            transform: scale(0);
            transition: all 0.3s;
            border-radius: 50%;
            filter: blur(10px);
        }
        .editBtn:hover::before {
            transform: scale(1);
        }
        .editBtn:hover {
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.336);
        }

        .editBtn svg {
            height: 17px;
            fill: white;
            z-index: 3;
            transition: all 0.2s;
            transform-origin: bottom;
        }
        .editBtn:hover svg {
            transform: rotate(-15deg) translateX(5px);
        }

        .editBtn:hover::after {
            transform: scaleX(1);
            left: 0px;
            transform-origin: right;
        }

        .button-container {
            display: flex;
            gap: 8px; 
            align-items: center;
        }

        .button,
        .editBtn {
            width: 40px; 
            height: 40px; 
        }

        .switch {
            --secondary-container: #fad9de;
            --primary: #ffb7c2;
            font-size: 17px;
            position: relative;
            display: inline-block;
            width: 3.7em;
            height: 1.8em;
        }

        .switch input {
            display: none;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #313033;
            transition: .2s;
            border-radius: 30px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 1.4em;
            width: 1.4em;
            border-radius: 20px;
            left: 0.2em;
            bottom: 0.2em;
            background-color: #aeaaae;
            transition: .4s;
        }

        input:checked + .slider::before {
            background-color: var(--primary);
        }

        input:checked + .slider {
            background-color: var(--secondary-container);
        }

        input:focus + .slider {
            box-shadow: 0 0 1px var(--secondary-container);
        }

        input:checked + .slider:before {
            transform: translateX(1.9em);
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
        
        @media (max-width: 768px) {
            nav {
                flex-wrap: wrap;
                padding: 0.5rem;
            }

            .navbar-center {
                justify-content: center;
                flex-wrap: wrap;
                margin: 0 auto;
            }

            .navbar-center h1 {
                font-size: 18px;
                text-align: center;
            }

            .logout-button {
                font-size: 12px;
                flex-direction: row;
                gap: 5px;
            }

            .principal {
                padding-top: 20px;
                flex-direction: column;
            }

            .table-container {
                width: 100%;
            }

            table {
                font-size: 14px;
                width: 100%;
            }

            thead {
                display: none; 
                display: none; 
            }

            tbody tr {
                display: block;
                margin-bottom: 1rem;
            }

            tbody tr td {
                display: flex;
                justify-content: space-between;
                padding: 0.5rem;
                border-bottom: 1px solid #ddd;
            }

            tbody tr td::before {
                content: attr(data-label);
                font-weight: bold;
                flex: 1;
            }

            .button-container {
                flex-wrap: wrap;
                justify-content: center;
                gap: 5px;
            }
            
            .form-control {
                width: 80vw;
            }
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <nav class="navbar navbar-expand-lg navbar-light fondo_personalizado">
            <div class="d-flex align-items-center">
                <a href="{{ route('dashboard') }}" class="btn logout-button flex-shrink-0 mb-2 mb-sm-0">
                    <i class='bx bxs-home custom-icon-size custom-icon-color'></i>
                    <span class="custom-color-text">Inicio</span>
                </a>
            </div>
            <div class="navbar-center flex-grow-1">
                <h1>CLIENTES</h1>
            </div>
        </nav>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <form action="{{route('buscar.usuario')}}" method="GET" class="d-flex w-50">
            <input style="border: solid black 1px" type="text" name="search" class="form-control me-2" placeholder="Buscar cliente..." value="{{ request()->get('search') }}"  oninput="this.form.submit()">
            <button class="btn btn-pink" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="principal">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="my-0">Lista de Clientes</h3>
                </div>
                <div class="card-body p-0 table-container">
                    <table class="table table-hover table-striped m-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Genero</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                            <tr>
                                <td data-label="Usuario">{{$usuario->name }}</td>
                                <td data-label="Correo">{{$usuario->email }}</td>
                                <td data-label="Nombre">{{$usuario->name }}</td>
                                <td data-label="Apellido">{{$usuario->last_name}}</td>
                                <td data-label="Edad">{{$usuario->age}}</td>
                                <td data-label="Género">{{$usuario->gender}}</td>
                                <td data-label="Teléfono">{{$usuario->phone}}</td>
                                <td>
                                    <form action="{{ route('actualizar_rol', $usuario->id) }}" method="POST" id="formActualizarRol">
                                        @csrf
                                        @method('PUT')
                                    <div class="button-container">
                                        <select name="rol" id="rol" required onchange="this.form.submit()">
                                            @foreach ($roles as $rol)
                                                <option value="{{ $rol->id }}" 
                                                    {{ $usuario->roles->pluck('id')->contains($rol->id) ? 'selected' : '' }}>
                                                    {{ $rol->rol }}
                                                </option>
                                            @endforeach
                                        </select>
                                        
                                    </form>
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="editBtn">
                                        <svg height="1em" viewBox="0 0 512 512">
                                            <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                                            ></path>
                                        </svg>
                                    </a>
                                        <form action="{{ route('toggle.status', $usuario->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <label class="switch">
                                                <input type="checkbox" id="switch-{{ $usuario->id }}" 
                                                    {{ $usuario->is_active ? 'checked' : '' }} 
                                                    onchange="this.form.submit();">
                                                <span class="slider"></span>
                                            </label>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        @if ($usuarios->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Anterior</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $usuarios->previousPageUrl() }}" aria-label="Previous">
                                <i class="fas fa-arrow-left"></i> Anterior
                            </a>
                        </li>
                        @endif
  
                        @foreach ($usuarios->getUrlRange(1, $usuarios->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $usuarios->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endforeach
  
                        @if ($usuarios->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $usuarios->nextPageUrl() }}" aria-label="Next">
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
