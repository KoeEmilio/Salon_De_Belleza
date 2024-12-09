<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje de Contacto</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff; 
            color: #d5006d; 
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 30px;
            background-color: #f8bbd0; 
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            color: #d5006d; 
        }

        p {
            font-size: 16px;
            margin: 10px 0;
        }

        .details {
            background-color: #fce4ec;
            padding: 15px;
            border-radius: 6px;
            margin-top: 20px;
            border-left: 4px solid #d5006d; 
        }

        .details p {
            margin: 8px 0;
            display: flex;
            align-items: center;
        }

        .details p strong {
            font-weight: bold;
            color: #000;
            margin-right: 8px;
        }

        .details p i {
            margin-right: 10px;
            color: #d5006d; 
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }

        .footer a {
            color: #d5006d;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2><i class="fas fa-envelope"></i> Nuevo Mensaje de Contacto</h2>
        </div>

        <div class="details">
            <p><i class="fas fa-user"></i><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
            <p><i class="fas fa-envelope"></i><strong>Correo Electrónico:</strong> {{ $data['email'] }}</p>
            <p><i class="fas fa-comments"></i><strong>Mensaje:</strong> {{ $data['mensaje'] }}</p>
        </div>

        <div class="footer">
            <p>Gracias por usar nuestro servicio. Si necesitas ayuda, no dudes en <a href="mailto:{{ $data['email'] }}">contactarnos</a>.</p>
        </div>
    </div>
</body>
</html>
