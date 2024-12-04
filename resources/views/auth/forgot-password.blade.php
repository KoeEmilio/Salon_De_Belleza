<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #fff;
            padding:40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            border: 2px solid #ff80b8;
        }

        h2 {
            text-align: center;
            font-size: 29px;
            font-weight: bold;
            color: #ff80b8;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        input[type="email"] {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #fafafa;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="email"]:focus {
            border-color: #ff80b8;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            background-color: #ff80b8;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ff4f91;
        }

        .info {
            text-align: center;
            font-size: 12px;
            color: #999;
            margin-top: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Recuperar Contraseña</h2>
        
        <form action="{{ route('custom.password.email') }}" method="POST">
            @csrf

     
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required 
                    placeholder="ejemplo@correo.com"
                >
            </div>

     
            <button type="submit">Enviar enlace</button>
        </form>

        <p class="info">
            Ingresa tu correo electrónico para recibir un enlace de recuperación de contraseña.
        </p>
    </div>
</body>
</html>
