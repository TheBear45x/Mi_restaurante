<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mi Restaurant</title>
    <link rel="stylesheet" href="{{ asset('CSS/app.css') }}">
</head>
<body>

<div class="login-wrapper">

    <div class="login-left">
        <img src="{{ asset('img/logo.png') }}" alt="logo" class="logo-img">
        <h1 class="logo">My Restaurant</h1>

        <div class="login-box">
            <h2>Bienvenido de nuevo</h2>

            <a href="{{ route('login.google') }}" class="btn-google">
                <img src="{{ asset('img/google.png') }}" alt="google">
                Continuar con Google
            </a>

            <div class="divider">o</div>

            {{-- <form action="/login" method="POST"> --}}
                <form action="{{ route('login.local') }}" method="POST">
                @csrf

                <input type="email" name="correo" placeholder="Correo electrónico">
                <input type="password" name="contrasena" placeholder="Contraseña">

                <button type="submit" class="btn-login">
                    Continuar
                </button>
            </form>

            <p class="footer-text">
                ¿No tienes cuenta? <a href="/crear_cuenta">Regístrate</a>
            </p>
        </div>
    </div>

    <div class="login-right">
        <img src="{{ asset('img/foto-login.jpg') }}" alt="fondo">
    </div>

</div>

</body>
</html>