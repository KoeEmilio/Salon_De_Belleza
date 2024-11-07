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
            background-color: #CFCFCF;
        }
        .text-decoration-none {
            text-decoration: none;
        }
        .fondo_personalizado {
            background-color: #000000;
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
            height: 100vh;
            width: 100vw;
            display: flex;
        }
        .container {
            height: 100%;
            flex-grow: 1;
            overflow-y: auto;
        }
        .container-2 {
            height: 100%; 
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            background-color: #adadad;
            align-items: center;
        }
        .btn-custom {
            margin: 10px;
            background-color: #000000;
            color: #ffb7c2;
            border: 2px solid #ffb7c2;
        }
        .btn-custom:hover {
            background-color: #ffb7c2;
            color: #000000;
        }
        .btn-container {
            padding: 15px 25px;
            border: unset;
            border-radius: 15px;
            color: #e8e8e8;
            z-index: 1;
            background: #212121;
            position: relative;
            font-weight: 1000;
            font-size: 17px;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
            overflow: hidden;
        }

        .btn-container::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 0;
        border-radius: 15px;
        background-color: #ffb7c2;
        z-index: -1;
        -webkit-box-shadow: 4px 8px 19px -3px rgba(255, 255, 255, 0.27);
        box-shadow: 4px 8px 19px -3px rgba(255, 255, 255, 0.27);
        transition: all 250ms
        }

        .btn-container:hover {
        color: #212121;
        }

        .btn-container:hover::before {
        width: 100%;
        }
        .search {
            margin-top: 20px;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #000000;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <nav class="navbar navbar-expand-lg navbar-light fondo_personalizado">
            <div class="navbar-center">
                <h1>SERVICIOS</h1>
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
            <input class="search" style="width: 100%" type="text" placeholder="Busca un servicio">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Duracion</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicios as $servicio)
                    <tr>
                        <td>{{ $servicio->id }}</td>
                        <td>{{ $servicio->service }}</td>
                        <td>{{ $servicio->price }}</td>
                        <td>{{ $servicio->description }}</td>
                        <td>{{ $servicio->duration }}</td>
                        <td>{{ $servicio->typeService->type }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="container-2">
            <button class="btn-container">Nominas</button>
            <button class="btn-container">Turnos</button>
            <button class="btn-container">Trabajos</button>
        </div>
    </div>
</body>
</html>
