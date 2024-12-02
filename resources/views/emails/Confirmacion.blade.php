<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Cita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #000000;
            color: #fe889f;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .content h1 {
            color: #4bc0c0;
        }
        .content p {
            margin: 10px 0;
        }
        .content ul {
            list-style-type: none;
            padding: 0;
        }
        .content ul li {
            background-color: #f1f1f1;
            margin: 5px 0;
            padding: 10px;
            border-radius: 4px;
        }
        .content ul li strong {
            color: #fe889f;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Confirmación de tu Cita</h1>
        </div>
        <div class="content">
            <p>Hola,</p>
            <p>Gracias por agendar tu cita. Aquí están los detalles:</p>
            <ul>
                <li><strong>Día:</strong> {{ $appointment->appointment_day }}</li>
                <li><strong>Hora:</strong> {{ $appointment->appointment_time }}</li>
                <li><strong>Tipo de Pago:</strong> {{ $appointment->payment_type }}</li>
                <li><strong>Estado:</strong> {{ $appointment->status }}</li>
            </ul>

            @if(!empty($services))
                <p><strong>Servicios incluidos:</strong></p>
                <ul>
                    @foreach($services as $service)
                        <li>{{ $service }}</li>
                    @endforeach
                </ul>
            @endif

            <p>¡Esperamos verte pronto!</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Glow Studio. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>