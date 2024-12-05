@extends('layouts.recepcionista')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4" style="color: #fe889f;">Detalles del Pedido</h2>

    <div class="text-center mb-4">
        <h3 style="color: #000;">Pedido #{{ $order->id }}</h3>
    </div>

    <h4 class="mt-4 mb-3" style="color: #000;">Detalles</h4>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead style="background-color: #000; color: #fe889f;">
                <tr>
                    <th>Servicio</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->serviceDetails as $serviceDetail)
                    <tr>
                        <td>{{ $serviceDetail->service->service_name }}</td>
                        <td>{{ $serviceDetail->quantity }}</td>
                        <td>{{ $serviceDetail->unit_price }}$MX</td>
                        <td>{{ $serviceDetail->total_price }}$MX</td>
                        <td>{{ $serviceDetail->service->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h4 class="mt-4 mb-3" style="color: #000;">Empleado que atendió</h4>
    <p>{{ $order->employee->person->first_name }} {{ $order->employee->person->last_name }}</p>

    
    @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
</div>
@endsection
