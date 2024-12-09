<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restablecer tu Contraseña</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #333333;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .email-header {
            margin-bottom: 30px;
        }
        .email-header img {
            width: 50px;
            height: 50px;
            margin-bottom: 20px;
        }
        .email-header h1 {
            font-size: 32px;
            color: #D91B6E; 
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .email-header p {
            font-size: 16px;
            color: #666666;
        }
        .email-body {
            font-size: 18px;
            color: #555555;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .email-body p {
            margin-bottom: 20px;
        }
        .email-body a {
            display: inline-block;
            padding: 15px 30px;
            background-color: #D91B6E;
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 50px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .email-body a:hover {
            background-color: #C2185B;
            transform: translateY(-2px);
        }
        .email-footer {
            font-size: 14px;
            color: #999999;
            margin-top: 30px;
        }
        .email-footer p {
            margin-bottom: 5px;
        }
        .email-footer a {
            color: #D91B6E;
            text-decoration: none;
        }
        .email-footer a:hover {
            text-decoration: underline;
        }
        .icon {
            font-size: 40px;
            color: #D91B6E; 
            margin-bottom: 15px;
        }
    </style>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <i class="fas fa-user-lock icon"></i>
            <h1>¡Recupera tu Cuenta!</h1>
            <p>Has solicitado restablecer tu contraseña. Haz clic en el enlace de abajo para proceder.</p>
        </div>
        <div class="email-body">
            <p>Para restablecer tu contraseña, haz clic en el siguiente enlace:</p>
            <a href="{{ $url }}">Restablecer mi contraseña</a>
        </div>
        <div class="email-footer">
            <p>Si no solicitaste este cambio, por favor ignora este mensaje.</p>
            <p>Gracias por elegirnos. Si tienes alguna duda, no dudes en <a href="#">contactarnos</a>.</p>
        </div>
    </div>
</body>
</html>
