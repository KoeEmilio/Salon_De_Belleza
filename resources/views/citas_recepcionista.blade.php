@extends('layouts.recepcionista')

@section('content')
<div class="container text-center">
    <h1 class="display-4">Gestión de Citas</h1>

    <!-- Calendario de vistas (anual, mensual, semanal, día) -->
    <div class="calendar-options my-4">
        <a href="#" class="btn btn-link">ANUAL</a>
        <a href="#" class="btn btn-link">MENSUAL</a>
        <a href="#" class="btn btn-link">SEMANAL</a>
        <a href="#" class="btn btn-link text-warning">DÍA</a>
    </div>

    <!-- Tabla de Citas Programadas -->
    <h3 class="mt-4">Citas Programadas</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>DÍA</th>
                <th>MES</th>
                <th>AÑO</th>
                <th>HORA</th>
                <th>CLIENTE</th>
                <th>SERVICIO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <!-- Ejemplo de cita programada -->
            <tr>
                <td>Lunes</td>
                <td>Octubre</td>
                <td>2024</td>
                <td>11:00</td>
                <td>Juan Pérez</td>
                <td>Corte de Cabello</td>
                <td><span class="badge bg-success">Confirmada</span></td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Cancelar</a>
                </td>
            </tr>
            <tr>
                <td>Lunes</td>
                <td>Octubre</td>
                <td>2024</td>
                <td>14:00</td>
                <td>María López</td>
                <td>Manicure</td>
                <td><span class="badge bg-warning">Pendiente</span></td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Cancelar</a>
                </td>
            </tr>
            <tr>
                <td>Lunes</td>
                <td>Octubre</td>
                <td>2024</td>
                <td>17:00</td>
                <td>Carlos García</td>
                <td>Maquillaje</td>
                <td><span class="badge bg-danger">Cancelada</span></td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Cancelar</a>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Botón para agregar nueva cita -->
    <div class="mt-4">
        <a href="{{ url('/recepcionista/nueva_cita') }}" class="btn btn-lg btn-success">Agregar Nueva Cita</a>
    </div>
</div>
@endsection
