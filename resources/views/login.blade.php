<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mi Restaurant</title>
    <link rel="stylesheet" href="{{ asset('CSS/app.css') }}">
</head>
<body>

    <div class="login-container">
        <div class="header-yellow">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo-restaurant">
        </div>

        <div class="login-body">
            <h1>Bienvenido</h1>
            <h2>MI - RESTAURANT</h2>

            <div class="login-card">
                <h3>Iniciar Sesión</h3>

                <form action="/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="correo" >
                    </div>

                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="contrasena" >
                    </div>

                    {{-- <button type="submit" class="btn-login" href="{{ route('menu') }}">Iniciar Sesión</button> --}}
                    <button type="submit" ... href="{{ route('menu') }}">
                    <a href="{{ route('login.google') }}" class="btn-login">Iniciar sesión con Google</a>
                    <br>
     
                </form>
<br>
                <div class="footer-text">
                    No tienes una cuenta. Crea una ahora mismo gratis <br>
                    <a href="/crear_cuenta">Crear cuenta</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>