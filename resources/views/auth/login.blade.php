<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <title>Inicia Sesion</title>
    <style>
        
    .login{
        height: 80vh;
        width: 30vw;
        border: 10px solid white;
        border-radius: 30px;
    }

    body {
        margin: 0;
        height: 100vh;
        display: flex;
         justify-content: center;  /*#ffbf00, #e2aa01 15%, #e6d39c 85%, #ffffff */
        align-items: center;
        background: linear-gradient(135deg,#fe889f, #ffb7c2 25%, #faccd3 75%, #ffffff);
        font-family: Arial, sans-serif;
    }

    .login {
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.1); /
        backdrop-filter: blur(10px); 
        border-radius: 20px;
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.6);
        padding: 20px;
        text-align: center;
        font-family: "Dancing Script", cursive
    }

    .contenedor h1 {
        color: white;
        margin-bottom: 20px;
    }

    .login input {
        width: 70%;
        padding: 12px;
        font-size: 16px;
        border-bottom: 1 solid black;
        border-radius: 4px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        margin-bottom: 40px;
    }

    .login button {
    width: 70%;
    padding: 12px;
    font-size: 18px;
    border: none;
    border-radius: 30px;
    background: linear-gradient(135deg, #ff6584, #ffb7c2);
    color: white;
    cursor: pointer;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-top: 20px;
}

.login button:hover {
    transform: translateY(-2px);
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
}

.login button:focus {
    outline: none;
}

    </style>
</head>
<body>
    <div class="login">
            <form action="{{route('login')}}" method="POST">
                @csrf
                <h1>Bienvenido</h1>

                <input type="text" name="email" placeholder="Email"" />
                @error('email')
                            <div class="error-message">{{ $message }}</div>
                @enderror
                <input type="password" name="password" placeholder="Contraseña"/>
                @error('password')
                            <div class="error-message">{{ $message }}</div>
                @enderror
                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>
    </form>
</body>
</html>
