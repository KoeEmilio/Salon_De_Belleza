<h2>Detalles de tu Pedido #{{ $order->id }}</h2>

<p>Estimado(a) {{ $order->client->first_name }} {{ $order->client->last_name }},</p>
<p>Gracias por tu pedido. A continuación se detallan los servicios adquiridos:</p>

<table style="width: 100%; border: 1px solid #ddd; border-collapse: collapse;">
    <thead>
        <tr>
            <th>Servicio</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->serviceDetails as $serviceDetail)
            <tr>
                <td>{{ $serviceDetail->service->service_name }}</td>
                <td>{{ $serviceDetail->quantity }}</td>
                <td>${{ number_format($serviceDetail->unit_price, 2) }}</td>
                <td>${{ number_format($serviceDetail->total_price, 2) }}</td>
                <td>{{ $serviceDetail->service->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p>Empleado que atendió: {{ $order->employee->person->first_name }} {{ $order->employee->person->last_name }}</p>

<p>¡Gracias por tu preferencia!</p>
