<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CSI SYSTEMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #e67e22;
            --dark-blue: #2c3e50;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--dark-blue) 0%, #1a252f 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            text-align: center;
            width: 100%;
            max-width: 380px;
            transition: transform 0.3s ease;
        }

        .login-box:hover {
            transform: translateY(-5px);
        }

        .login-box h2 {
            margin: 0 0 10px;
            color: var(--dark-blue);
            font-weight: 600;
            font-size: 1.8rem;
        }

        .login-box p {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }

        .btn-google {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 14px;
            background: white;
            border: 2px solid #f1f1f1;
            border-radius: 12px;
            text-decoration: none;
            color: #555;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn-google:hover {
            background: #fdfdfd;
            border-color: var(--primary-color);
            box-shadow: 0 5px 15px rgba(230, 126, 34, 0.15);
            color: var(--dark-blue);
        }

        .logo-restaurant {
            font-size: 3rem;
            margin-bottom: 15px;
            display: block;
        }

        .footer-text {
            margin-top: 25px;
            font-size: 0.75rem;
            color: #bdc3c7;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

<div class="login-box">
    <span class="logo-restaurant">🍽️</span>
    <h2>MI RESTAURANT</h2>
    <p>Panel de Administración Gastronómica</p>
    
    <a href="{{ route('google.login') }}" class="btn-google">
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" width="22">
        Entrar con Google
    </a>

    <div class="footer-text">
        Mi Restaurant v2.0
    </div>
</div>

</body>
</html>