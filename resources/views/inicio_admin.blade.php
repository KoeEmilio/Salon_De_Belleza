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
            background-color: #f8f8f8;
        }

        .fondo_personalizado {
            background-color: #000000;
            padding: 15px 0;
        }

        .custom-color-text {
            color: #fe889f;
        }

        .custom-icon-size {
            font-size: 30px;
        }

        .custom-icon-color {
            color:#ffe3e8;
        }

        .logout-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
        }

        .menu-button {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 250px;
            width: 250px;
            border: 4px solid transparent; 
            border-radius: 20px;
            background-color:black;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .menu-button:hover {
            background-color: #fe889f;
            transform: translateY(-8px);
            color: black;
            border-color: transparent; 
            text-decoration: none;
        }

        .menu-button h2 {
            margin-top: 20px;
            color: #fe889f;
            transition: color 0.3s ease;
            text-decoration: none;
        }

        .menu-button:hover h2 {
            color: black;
            text-decoration: none;
        }

        .menu-button:hover a{
            text-decoration: none;
        }
        
        .containers{
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 70vh;
        }

        @media (max-width: 767.98px) {
            .menu-button {
                height: 200px;
                width: 200px;
            }

            .menu-button h2 {
                font-size: 24px;
            }

            .custom-icon-size {
                font-size: 46px;
            }
        }

        @media (max-width: 575.98px) {
            .menu-button {
                height: 150px;
                width: 150px;
            }

            .menu-button h2 {
                font-size: 14px;
            }

            .custom-icon-size {
                font-size: 28px;
            }

            .contenedor nav h1{
                font-size: 30px;
                margin-left: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <nav class="navbar navbar-expand-lg navbar-light fondo_personalizado">
            <div class="container d-flex justify-content-between align-items-center">
                <h1 class="custom-color-text">Bienvenido {{$user->name}}</h1>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn logout-button">
                        <i class='bx bx-log-out custom-icon-size custom-icon-color'></i>
                        <span class="custom-color-text">Salir</span>
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <div class="containers mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center mb-4">
                <a href="{{ route('clientes_admin') }}" class="menu-button">
                    <i class='bx bx-user custom-icon-size custom-icon-color'></i>
                    <h2>Clientes</h2>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center mb-4">
                <a href="{{ route('servicios_admin') }}" class="menu-button">
                    <i class='bx bx-library custom-icon-size custom-icon-color'></i>
                    <h2>Servicios</h2>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center mb-4">
                <a href="{{ route('empleados') }}" class="menu-button">
                    <i class='bx bx-group custom-icon-size custom-icon-color'></i>
                    <h2>Empleados</h2>
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
