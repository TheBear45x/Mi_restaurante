<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - Mi Restaurant</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="login-container">
        <div class="header-yellow">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo-restaurant">
        </div>

        <div class="login-body">
            <div class="login-card">
                <<form action="{{ route('registrar.post') }}" method="POST">
    <form action="{{ route('registrar.post') }}" method="POST">
    @csrf

    <h3>Nombres:</h3>
    <input type="text" name="nombres" required>

    <h3>Apellido Paterno:</h3>
    <input type="text" name="apaterno" required>

    <h3>Apellido Materno:</h3>
    <input type="text" name="amaterno" required>

    <h3>Edad:</h3>
    <input type="number" name="edad" required>

    <h3>Correo:</h3>
    <input type="email" name="correo" required>

    <h3>Teléfono:</h3>
    <input type="text" name="telefono" required>

    <h3>Contraseña:</h3>
    <input type="password" name="password" required> <br><br>
    <button type="submit" class="btn-crear">¡Guardar y Entrar!</button>
</form>

<p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">INICIAR SESIÓN</a></p>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/animaciones.js') }}"></script>
</body>
</html>