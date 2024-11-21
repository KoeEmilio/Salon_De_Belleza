@extends('layouts.PerfilUsuario')
@section('title', 'Mi Perfil')

@push('styles')
    <style>
        body {
            background-color: #fff0f5;
        }

        .card-header {
            background-color: #000000;
            color: #ffb7c2;
            text-align: center;
        }

        .card {
            height: auto; /* Adaptable al contenido */
            width: 100%; 
            max-width: 800px; 
            margin: 20px auto; /* Centrado horizontalmente */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative; /* Contenedor relativo para botones absolutos */
        }

        .content-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: auto; /* Ajusta dinámicamente según el contenido */
            padding: 20px;
            width: 100%;
        }

        .card-b {
            margin-top: 5px;
            padding: 20px; /* Espacio interno para mejor legibilidad */
        }

        .editBtn {
            width: 40px;
            height: 40px;
            border-radius: 20px;
            border: none;
            background-color: rgb(93, 93, 116);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.123);
            cursor: pointer;
            position: absolute;
            right: 20px; /* Anclado dentro del contenedor */
            top: 15px;
            transition: all 0.3s;
            overflow: hidden;
            z-index: 2;
        }

        /* Hover effect */
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

        /* Responsiveness */
        @media (max-width: 768px) {
            .card {
                max-width: 100%; /* Ocupa el 100% del ancho en pantallas pequeñas */
            }

            .editBtn {
                width: 35px;
                height: 35px;
               
            }

            .card-b {
                padding: 10px; /* Reduce el padding interno */
            }
        }

        @media (max-width: 576px) {
            .content-center {
                padding: 10px;
            }

            .editBtn {
                width: 30px;
                height: 30px;
                right: 10px; /* Ajusta posición en dispositivos más pequeños */
                top: 10px;
            }

            .card {
                padding: 10px;
            }
        }
    </style>
@endpush



@section('body')
    <div class="content-center">
        <div class="card">
            <div class="card-header">
                <h3>Información Personal</h3>
                <button class="editBtn">
                    <svg height="1em" viewBox="0 0 512 512">
                      <path
                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                      ></path>
                    </svg>
                  </button>
            </div>
            <div class="card-b">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombr</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $cliente->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $cliente->last_name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Número de Contacto</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $cliente->age }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $cliente->gender }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ $cliente->phone }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection