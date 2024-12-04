@extends('layouts.recepcionista')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4" style="color: #fe889f;">Orden #{{ $order->id }}</h2>
    <p><strong>Cliente:</strong> {{ $order->client->first_name }} {{ $order->client->last_name }}</p>
    <p><strong>Empleado Asignado:</strong> 
        @if ($order->employee)
        <p>{{ $order->employee->person->first_name }} {{ $order->employee->person->last_name }}</p>
        @else
            <form action="{{ route('orders.createOrder', $order->appointment->id) }}" method="POST">
                @csrf
                <label for="employee_id">Seleccionar Empleado:</label>
                <select name="employee_id" id="employee_id" required>
                    <option value="">-- Seleccione un empleado --</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Crear Orden</button>
            </form>
        @endif
    </p>
    <p><strong>Servicios:</strong></p>
    <ul>
        @foreach($order->details as $detail)
            <li>{{ $detail->service->service_name }} - {{ $detail->total_price }}</li>
        @endforeach
    </ul>
    <a href="{{ route('appointment.index') }}" class="btn btn-outline-dark">Regresar</a>
</div>
@endsection
