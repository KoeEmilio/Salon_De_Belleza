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
            overflow-x: auto;
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

        @media (max-width: 768px) {
            .table th, .table td {
                font-size: 0.9rem; 
            }
            .table {
                font-size: 0.8rem; 
            }
        }

        @media (max-width: 480px) {
            .card-header h3 {
                font-size: 1.2rem; 
            }
            .pagination-container {
                font-size: 0.8rem;
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($citas as $cita)
                        <tr>
                            <td>{{ $cita->sign_up_date }}</td>
                            <td>{{ $cita->appointment_day }}</td>
                            <td>{{ $cita->appointment_time}}</td>
                            <td>{{ $cita->name}}</td>
                            <td>{{ $cita->status}}</td>
                            <td>{{ $cita->payment_type}}</td>
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
