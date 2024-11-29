@extends('layouts.recepcionista')

@section('content')
<div class="container">
    <h2>Servicios de la Cita</h2>
    
    <h3>Cita de: {{ $cita->owner->first_name }} {{ $cita->owner->last_name }}</h3>
    <a href="{{ route('service.create', $cita->id) }}" class="btn btn-primary">Agregar Servicio</a>
    <h4>Servicios actuales:</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Servicio</th>
                <th>Duracion</th>
                <th>Cantidad</th>
                <th>Precio servicio</th>               
                <th>Tipo de Cabello</th>
                <th>Precio Adicional por Tipo de Cabello</th>
                <th>Precio Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cita->serviceDetails as $serviceDetail)
                <tr>
                    <td>{{ $serviceDetail->service->service_name }}</td>
                    <td>{{ $serviceDetail->service->duration }}</td>
                    <td>{{ $serviceDetail->quantity }}</td>
                    <td>${{ $serviceDetail->unit_price }}</td>
                    <td>{{ $serviceDetail->hairType->type }}</td>
                    <td>{{ $serviceDetail->hairType->price }}</td>
                    <td>${{ $serviceDetail->total_price }}</td>
                    <td>    

                   
                        <a href="{{ route('service.edit', $serviceDetail->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

   
</div>
@endsection
