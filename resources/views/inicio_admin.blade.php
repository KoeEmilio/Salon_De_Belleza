<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>

        body{
            background-color: #CFCFCF;
        }
        .text-center {
            text-align: center;
        }

        .menu {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            width: 100%;
        }
        .menu-button {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 250px;
            width: 250px;
            border: 2px solid black;
            border-radius: 30px;
            color: white;
            text-decoration: none;
            background-color: #1a1a1a;
        }
        .text-decoration-none {
            text-decoration: none;
        }
        .my-4 {
            margin: 1rem 0;
        }
        .texto-menu {
            color: black;
        }
        .navbar {
            width: 100%;
            height: 100%;
            color: white;
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
            color:  #ffb7c2;
        }
        .custom-icon-size {
            font-size: 48px;
        }
        .custom-icon-color {
            color: #ffb7c2;
        }
        
        .custom-icon-color-2 {
            color: #ffb7c2;
        }

        .text-center {
            margin-top: 50px;
            text-align: center;
        }

        .text-center i{
            font-size: 120px;
        }
        .logout-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
        }
        #botones-nav-1, #botones-nav-2, #botones-nav-3 {
            height: 250px;
            width: 250px;
            background-color: black;
            border: black solid 5px;
            border-radius: 30px;
            margin-left: 5px;
        }
        #contenedor-botones {
            display: flex;
            justify-content: space-between;
            margin-top: 12%;
        }
        nav h1 {
            margin-left: 40%;
        }

        #botones-nav-1:hover, #botones-nav-2:hover, #botones-nav-3:hover {
            background-color: rgb(43, 42, 42);
            transform: translateY(-5px);

        }

        .text-icon-1, .text-icon-2, .text-icon-3 {
            display: block;
            color: black;
            margin-top: 10px;
            position: absolute;
        }

        .text-icon-1 {
            margin-top: 250px;
    
        }

        .text-icon-2 {
            margin-top: 250px;
        }

        .text-icon-3 {
            margin-top: 250px;
        }
        
    </style>
</head>
<body>
    <div class="contenedor">
        <nav class="navbar navbar-expand-lg navbar-light fondo_personalizado justify-content-center">
            <h1 style="color: #ffb7c2">Bienvenido {{$user->name}}</h1>
            <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                @csrf
                <button type="submit" class="btn logout-button">
                    <i class='bx bx-log-out custom-icon-size custom-icon-color'></i>
                    <span class="custom-color-text">Logout</span>
                </button>
            </form>
        </nav>
    </div>

    <div class="container  d-flex flex-column align-items-center" id="contenedor-botones">
        <div class="row menu flex-grow-1">
            <a href="{{route('')}}"></a>
            <div class="col-12 col-sm-3 d-flex justify-content-center" id="botones-nav-1">
                    <div class="text-center">
                        <i class='bx bx-user custom-icon-size custom-icon-color-2'></i>
                    </div>
                </a>
                <h2 class="text-icon-1">Clientes</h2>
            </div>
            <div class="col-12 col-sm-3 d-flex justify-content-center" id="botones-nav-2">
                    <div class="text-center">
                        <i class='bx bx-library custom-icon-size custom-icon-color-2'></i>
                    </div>
                </a>
                <h2 class="text-icon-2">Servicios</h2>
            </div>
            <div class="col-12 col-sm-3 d-flex justify-content-center" id="botones-nav-3">
                    <div class="text-center">
                        <i class='bx bx-group custom-icon-size custom-icon-color-2'></i>
                    </div>
                </a>
                <h2 class="text-icon-3">Empleados</h2>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>