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
            height: auto; /
            width: 100%; 
            max-width: 800px; 
            margin: 20px auto; 
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative; 
        }

        .content-center {
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: auto; 
            padding: 20px;
            width: 100%;
        }

        .card-b {
            margin-top: 5px;
            padding: 20px; 
        }



        @media (max-width: 768px) {
            .card {
                max-width: 100%; 
            }

            .card-b {
                padding: 10px; 
            }
        }

        @media (max-width: 576px) {
            .content-center {
                padding: 10px;
            }

            .editBtn {
                width: 30px;
                height: 30px;
                right: 10px; 
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
            </div>
            <div class="card-b">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="first_name" value="{{ $cliente->first_name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $cliente->last_name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Edad</label>
                    <input type="text" class="form-control" id="age" name="age" value="{{ $cliente->age }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Genero</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="{{ $cliente->gender }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $cliente->phone }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection