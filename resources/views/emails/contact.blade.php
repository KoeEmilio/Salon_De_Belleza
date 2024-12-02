<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body>
    <h2>Has recibido un nuevo mensaje de contacto</h2>
    <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $data['email'] }}</p>
    <p><strong>Mensaje:</strong> {{ $data['mensaje'] }}</p>
</body>
</html>
