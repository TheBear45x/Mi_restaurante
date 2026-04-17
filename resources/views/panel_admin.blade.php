<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración | Sistema</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #6366f1;
            --bg-color: #f8fafc;
            --text-color: #1e293b;
            --card-bg: #ffffff;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* --- CABECERA --- */
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
            margin-bottom: 3rem;
        }

        .header-container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .header-info h1 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .header-info p {
            margin: 0.5rem 0 0;
            opacity: 0.8;
            font-size: 0.95rem;
        }

        .btn-logout {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-logout:hover {
            background: white;
            color: var(--primary-color);
            transform: scale(1.05);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        }

        /* --- CUERPO DEL PANEL --- */
        .admin-grid {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
            padding: 0 20px 40px;
            width: 100%;
            box-sizing: border-box;
        }

        .menu-card {
            background: var(--card-bg);
            text-decoration: none;
            color: var(--text-color);
            padding: 2.5rem 1.5rem;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }

        .icon-box {
            width: 70px;
            height: 70px;
            background: #f1f5f9;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.2rem;
            transition: var(--transition);
        }

        .menu-card i {
            font-size: 2rem;
            color: var(--primary-color);
        }

        .menu-card span {
            font-weight: 600;
            font-size: 1.1rem;
            color: #334155;
        }

        /* --- ANIMACIONES HOVER --- */
        .menu-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }

        .menu-card:hover .icon-box {
            background: var(--primary-color);
        }

        .menu-card:hover i {
            color: white;
            transform: rotate(5deg);
        }

        /* Colores dinámicos al pasar el mouse */
        .comentarios:hover { border-color: #f59e0b; }
        .comentarios:hover .icon-box { background: #f59e0b; }
        
        .usuarios:hover { border-color: #10b981; }
        .usuarios:hover .icon-box { background: #10b981; }
        
        .proveedores:hover { border-color: #3b82f6; }
        .proveedores:hover .icon-box { background: #3b82f6; }
        
        .reservaciones:hover { border-color: #ec4899; }
        .reservaciones:hover .icon-box { background: #ec4899; }

        /* Mobile */
        @media (max-width: 650px) {
            .header-container {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }
            .header-info h1 { font-size: 1.5rem; }
        }
    </style>
</head>
<body>

    <header>
        <div class="header-container">
            <div class="header-info">
                <h1>Pantalla Principal del Panel</h1>
                <p>Bienvenido de nuevo, Administrador</p>
            </div>
            <a href="{{ url('/menu') }}" class="btn-logout">
                <i class="fas fa-arrow-left"></i> Volver al Menú
            </a>
        </div>
    </header>

    <main class="admin-grid">
        <a href="{{ route('comentarios.lista') }}" class="menu-card comentarios">
            <div class="icon-box">
                <i class="fas fa-comments"></i>
            </div>
            <span>Gestión de Comentarios</span>
        </a>

        <a href="{{ route('usuarios.lista') }}" class="menu-card usuarios">
            <div class="icon-box">
                <i class="fas fa-user-shield"></i>
            </div>
            <span>Control de Usuarios</span>
        </a>

        <a href="{{ route('provedores.lista') }}" class="menu-card proveedores">
            <div class="icon-box">
                <i class="fas fa-truck-loading"></i>
            </div>
            <span>Lista de Proveedores</span>
        </a>

        <a href="{{ route('reservaciones.lista') }}" class="menu-card reservaciones">
            <div class="icon-box">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <span>Reservas Activas</span>
        </a>
    </main>

</body>
</html>