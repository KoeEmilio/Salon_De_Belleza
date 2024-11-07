@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container fill-height d-flex flex-column align-items-center">
    <img src="/src/img/logonegro.png" alt="logo" width="150" height="100" class="my-4" />
    <div class="row menu flex-grow-1">
        <div class="col-12 col-sm-3 d-flex justify-content-center">
                <button class="btn btn-dark w-100 h-100">
                    <div class="text-center">
                        <i class="mdi mdi-account" style="font-size: 48px;"></i>
                        <h1>CLIENTE</h1>
                    </div>
                </button>
            </a>
        </div>
        <div class="col-12 col-sm-3 d-flex justify-content-center">
                <button class="btn btn-dark w-100 h-100">
                    <div class="text-center">
                        <i class="mdi mdi-account-tie" style="font-size: 48px;"></i>
                        <h1>Empleados</h1>
                    </div>
                </button>
            </a>
        </div>
        <div class="col-12 col-sm-3 d-flex justify-content-center">
                <button class="btn btn-dark w-100 h-100">
                    <div class="text-center">
                        <i class="mdi mdi-car-back" style="font-size: 48px;"></i>
                        <h1>Vehiculos</h1>
                    </div>
                </button>
            </a>
        </div>
        <div class="col-12 col-sm-3 d-flex justify-content-center">
                <button class="btn btn-dark w-100 h-100">
                    <div class="text-center">
                        <i class="mdi mdi-account-plus" style="font-size: 48px;"></i>
                        <h1>REGISTRAR</h1>
                        <h1>USUARIO</h1>
                    </div>
                </button>
            </a>
        </div>
    </div>
</div>
@endsection