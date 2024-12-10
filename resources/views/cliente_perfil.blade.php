@extends('layouts.cliente')

@section('content')
    <div class="container mt-5">
        <div class="card mb-4 shadow-sm">
            <div class="card-header text-white" style="background-color: #333;">
                <h4 class="my-0 font-weight-normal">Perfil del Client</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="/img/default-profile.png" class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px;" alt="Foto de perfil">
                        <h5 class="mt-2">{{ $cliente->nombre }} {{ $cliente->apellido }}</h5>
                        <p class="text-muted">{{ $cliente->email }}</p>
                    </div>
                    <div class="col-md-8">
                        <h5 class="font-weight-bold">Información Personal</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Fecha de Nacimiento:</strong> {{ $cliente->fecha_nacimiento }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Membresía:</strong> {{ $cliente->tipo_membresia }}</p>
                            </div>
                        </div>
                        <h5 class="font-weight-bold mt-4">Información Adicional</h5>
                        <p><strong>Historial de Compras:</strong> {{ $cliente->historial_compras }}</p>
                        <p><strong>Última Visita:</strong> {{ $cliente->ultima_visita }}</p>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('cliente.editarPerfil') }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Editar Perfil
                            </a>
                            <a href="{{ route('cliente.historial') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-history"></i> Ver Historial
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Citas</h5>
                        <p class="card-text">Ver y administrar tus citas programadas.</p>
                        <a href="{{ route('cliente.citas') }}" class="btn btn-outline-primary">Gestionar Citas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Beneficios</h5>
                        <p class="card-text">Descubre los beneficios de tu membresía.</p>
                        <a href="{{ route('cliente.beneficios') }}" class="btn btn-outline-primary">Ver Beneficios</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Soporte</h5>
                        <p class="card-text">Contáctanos si necesitas ayuda o soporte técnico.</p>
                        <a href="{{ route('cliente.soporte') }}" class="btn btn-outline-primary">Solicitar Soporte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
