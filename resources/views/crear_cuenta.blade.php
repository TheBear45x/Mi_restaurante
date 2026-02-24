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
                <form id="registroForm">
                    <h3>Nombre Completo:</h3>
                    <div class="form-group">
                        <input type="text" id="nombre" name="nombre" required>
                    </div>

                    <h3>Correo electrónico:</h3>
                    <div class="form-group">
                        <input type="email" id="correo" name="correo" required>
                    </div>

                    <h3>Contraseña:</h3>
                    <div class="form-group">
                        <input type="password" id="pass" name="pass" required>
                    </div>

                    <h3>Num. Teléfono:</h3>
                    <div class="form-group">
                        <input type="text" id="telefono" name="telefono">
                    </div>

                    <button type="button" class="btn-crear" onclick="mostrarAnimacion()">
                        Craer Cuenta!
                    </button>
                </form>

                <p class="footer-text">Ya tienes una cuenta? Incía Sesion ya!</p>
                
                <a href="/" class="btn-iniciar-link">
                    INICIAR SESION
                </a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/animaciones.js') }}"></script>
</body>
</html>