
@extends('layouts.recepcionista')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4" style="color: #fe889f;">Servicios de la Cita</h2>
    
    <h3 class="text-center mb-3" style="color: #000;">Cita de: {{ $cita->owner->first_name }} {{ $cita->owner->last_name }}</h3>
    
    <div class="text-center mb-4">
        <a href="{{ route('service.create', $cita->id) }}" class="c-button c-button--gooey">
            Agregar Servicio
            <div class="c-button__blobs">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </a>
    </div>

    <h4 class="mt-4 mb-3" style="color: #000;">Servicios actuales</h4>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead style="background-color: #000; color: #fe889f;">
                <tr>
                    <th>Servicio</th>
                    <th>Duración</th>
                    <th>Cantidad</th>
                    <th>Precio servicio</th>
                    <th>Tipo de Cabello</th>
                    <th>Precio Adicional por Tipo de Cabello</th>
                    <th>Precio Total</th>
                    <th>Pedido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cita->serviceDetails as $serviceDetail)
                    <tr>
                        <td>{{ $serviceDetail->service->service_name }}</td>
                        <td>{{ $serviceDetail->service->duration }}</td>
                        <td>{{ $serviceDetail->quantity }}</td>
                        <td>{{ $serviceDetail->unit_price }}</td>
                        <td>{{ $serviceDetail->hairType->type }}</td>
                        <td>{{ $serviceDetail->hairType->price }}</td>
                        <td>{{ $serviceDetail->total_price }}</td>
                        <td>{{ $serviceDetail->order_id ? 'Pedido #' . $serviceDetail->order_id : 'No asignado' }}</td>
                        <td>
                            <a href="{{ route('service.edit', $serviceDetail->id) }}" class="editBtn">
                                <!-- Ícono de editar -->
                                <svg height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                                    ></path>
                                </svg>
                            </a>
                            <!-- Botón para ver detalles del pedido -->
                            @if($serviceDetail->order_id)
                            <a href="{{ route('order.details', $serviceDetail->order_id) }}" class="btn btn-info btn-sm">Ver Detalles del Pedido</a>
                        @else
                            <span class="text-muted">Sin Pedido Asignado</span>
                        @endif                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('appointment.index') }}" class="btn btn-outline-dark">Regresar</a>
    </div>
</div>



<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #fff0f5;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table {
        margin-bottom: 0;
    }

    .btn {
        font-weight: bold;
    }

    .btn-warning {
        background-color: #ffb7c2;
        border: 1px solid #fe889f;
    }

    .btn-warning:hover {
        background-color: #fe889f;
        color: #fff;
    }

    .editBtn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        background-color: rgb(93, 93, 116);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.123);
        cursor: pointer;
        transition: all 0.3s;
        position: relative;
    }

    .editBtn svg {
        fill: #fff;
        height: 1em;
        transition: all 0.2s;
    }

    .editBtn:hover {
        background-color: #fe889f;
    }

    .editBtn:hover svg {
        transform: scale(1.1);
    }

    /* Botón Gooey */
    .c-button {
        display: inline-block;
        font-size: 16px;
        font-weight: bold;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 0.8em 1.5em;
        color: #fff;
        background-color: #fe889f;
        border: none;
        cursor: pointer;
        overflow: hidden;
        position: relative;
    }

    .c-button--gooey .c-button__blobs {
        filter: url(#goo);
    }
</style>
@endsection