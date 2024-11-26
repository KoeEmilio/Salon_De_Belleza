@extends('layouts.PerfilUsuario')
@section('title', 'Mis Citas')

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

        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .card {
            width: 100%; 
            max-width: 800px;
            margin: 0 auto;
        }

        .table-responsive {
            overflow-x: auto; /* Permite scroll horizontal en pantallas pequeñas */
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .content-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh; 
            padding: 10px;
        }

        @media (max-width: 958px) {
            .table th, .table td {
                font-size: 0.8rem;
                padding: 0.4rem; /* Espaciado reducido */
                text-align: center; /* Mejor alineación */
            }

            .pagination-container {
                text-align: center;
                margin: 10px 0;
            }
            .pagination-container .page-item {
                display: inline-block;
                margin: 0 5px;
            }
            .pagination-container .page-link {
                font-size: 0.8rem;
                padding: 5px 10px;
            }

            /* Card Title */
            .card-header h3 {
                font-size: 1.2rem;
                text-align: center;
            }
        }

        /* Ajustes para dispositivos muy pequeños */
        @media (max-width: 629px) {
            .navbar-center {
                justify-content: center;
                text-align: center;
            }

            .table-responsive {
                overflow-x: auto;
                display: block;
                width: 100%;
            }

            .table th, .table td {
                display: block;
                width: 100%;
                box-sizing: border-box;
                text-align: left;
                padding: 8px 4px; /* Reduce el espaciado interno */
                font-size: 0.9rem; /* Fuente más pequeña */
            }

            .table th {
                background-color: #f8f9fa;
                font-weight: bold;
            }

            .table td {
                border-top: 1px solid #dee2e6;
            }

            .table thead {
                display: none;
            }

            .table tr {
                display: block;
                margin-bottom: 10px;
            }

            .table tr td:first-child {
                border-top: none;
            }

            .pagination-container {
                flex-wrap: wrap; /* Ajusta la paginación en varias filas si es necesario */
            }

            .page-link {
                padding: 6px 10px; /* Botones más pequeños */
                font-size: 0.9rem;
            }
        }       

        .page-item.active .page-link {
            z-index: 3;
            color: black;
            background-color: #ffb7c2;
            border-color: black;
        }

        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #ffb7c2;
            background-color: #000000;
            border: 1px solid #dee2e6;
        }

        .page-link:hover {
            z-index: 2;
            color: #000000;
            text-decoration: none;
            background-color: #ffb7c2;
            border-color: #dee2e6;
        }

        .page-item.disabled .page-link {
            color: #ffb7c2; 
            background-color: #000000; 
            border-color: #000000; 
            pointer-events: none; 
        }

        .cancel-button {
            background-color: #212121; 
            color: #e8e8e8; 
            border: 2px solid #212121; 
            border-radius: 80px; 
            font-size: 1rem; 
            padding: 10px 20px;
            cursor: pointer; 
            transition: all 0.3s ease;
            position: relative; 
            overflow: hidden; 
        }

        .cancel-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: #ffb7b7;
            z-index: 1;
            transition: all 0.4s ease;
        }

        .cancel-button:hover::before {
            left: 0;
        }

        .cancel-button:hover {
            color: rgb(0, 0, 0); 
            border-color: #ffb7b7;
        }

        .cancel-button span {
            position: relative;
            z-index: 2;
        }

        @media (max-width: 629px) {
            .card-header {
                width:380px;
            }

            .card-body {
                width:380px;
            }

        }

       

        
        }

    </style>
@endpush

@section('body')
<div class="content-center">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="my-0">Mis Citas</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped m-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">F/H de registro</th>
                            <th scope="col">Dia programado para la cita</th>
                            <th scope="col">Hora programada para la cita</th>
                            <th scope="col">Propietario de la cita</th>
                            <th scope="col">Estado de la cita</th>
                            <th scope="col">Forma de pago</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($citas as $cita)
                        <tr>
                            <td data-label="F/H de registro">{{ $cita->sign_up_date }}</td>
                            <td data-label="Dia programado para la cita">{{ $cita->appointment_day }}</td>
                            <td data-label="Hora programada para la cita">{{ $cita->appointment_time}}</td>
                            <td data-label="Propietario de la cita">{{ $cita->first_name}}</td>
                            <td data-label="Estado de la cita">{{ $cita->status}}</td>
                            <td data-label="Forma de pago">{{ $cita->payment_type}}</td>
                            <td data-label="Acciones">
                                <button class="cancel-button">
                                    <span>Cancelar</span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="pagination-container">
        {{ $citas->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection