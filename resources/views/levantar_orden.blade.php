@extends('layouts.recepcionista')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4" style="color: #fe889f;">Orden #{{ $order->id }}</h2>
    <div class="card p-4">
        <p><strong>Cliente:</strong> {{ $order->client->first_name }} {{ $order->client->last_name }}</p>
        <p><strong>Empleado Asignado:</strong></p>
        <p class="text-success">{{ $order->employee->person->first_name }} {{ $order->employee->person->last_name }}</p>
        <hr>
        <p><strong>Servicios:</strong></p>
        <ul>
            @foreach($order->details as $detail)
                <li>{{ $detail->service->service_name }} - ${{ number_format($detail->total_price, 2) }}</li>
            @endforeach
        </ul>
        <a href="{{ route('appointment.index') }}" class="btn btn-outline-dark mt-3">Regresar</a>
    </div>
</div>
@endsection
