<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .button {
            display: block;
            width: 100%;
            text-align: center;
            padding: 15px;
            background-color: #6366F1;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #6B7280;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Restablece tu contraseña</h1>
            <p>Haz clic en el siguiente botón para restablecer tu contraseña:</p>
        </div>

        <a href="{{ $url }}" class="button">Restablecer Contraseña</a>

        <div class="footer">
            <p>Si no solicitaste este cambio, por favor ignora este correo.</p>
        </div>
    </div>
</body>
</html>
