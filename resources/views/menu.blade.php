<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mneu-Opciones</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <span class="user-name">{{ Auth::user()->name }}</span>

    <header class="navbar">
        <button class="btn-hamburguesa" onclick="toggleMenu()">☰</button>
        <img src="{{ asset('img/logo.png') }}" class="logo-top">
        <div class="user-header">
            <div class="user-text">
                <span class="user-name">Juan Santiago</span>
            </div>
            <div class="user-circle">JS</div>
        </div>
    </header>

    <aside id="sidebar" class="sidebar">
        <div class="sidebar-header">Inicio</div>
        <nav class="sidebar-nav">
            <a href="#">Realizar Reservacion</a>
            <a href="#">Realizar Pedido</a>
            <a href="#">Ver Platillos</a>
            <a href="#">Ver Opiniones</a>
            <a href="#">Ver Sucursales</a>
            <a href="#">Ver mis Pedidos</a>
            <a href="#">Ver mis Reservaciones</a>
        </nav>
    </aside>

    <main id="main-content">
        <section class="welcome-container">
            <div class="welcome-image-box">
                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600" alt="Restaurant">
            </div>
            <div class="welcome-text-box">
                <h2>Bienvenido a MI-RESTAURANT</h2>
                <p>Texto fimkvmdvkmoemvdplsv 'sv,dvd s vokgmemremvposvpogvomvsvñshf vewkpsmwi3qf0iwdpfw0e309tgOek1 u56v5hyntvcñsksmdñxspkldldlx,fkkk</p>
            </div>
        </section>

        <div class="full-separator">
            <div class="orange-line"></div>
            <div class="yellow-line"></div>
        </div>

        <section class="platillos-section">
            <h1 class="title-main">PLATILLOS</h1>
            <div class="grid-platillos">
                <div class="card">
                    <div class="card-img">Imagen</div>
                    <div class="card-body">
                        <h3>Platillo 1</h3>
                        <p>Platillo delicioso muy rico conksvlsavwoianfvosklvls eeevvvevvvdfvdfvdfvdfvdf</p>
                    </div>
                </div>
                <div class="card"><div class="card-img">Imagen</div><div class="card-body"><h3>Platillo 2</h3><p>...</p></div></div>
                <div class="card"><div class="card-img">Imagen</div><div class="card-body"><h3>Platillo 3</h3><p>...</p></div></div>
                <div class="card"><div class="card-img">Imagen</div><div class="card-body"><h3>Platillo 4</h3><p>...</p></div></div>
                <div class="card"><div class="card-img">Imagen</div><div class="card-body"><h3>Platillo 5</h3><p>...</p></div></div>
                <div class="card"><div class="card-img">Imagen</div><div class="card-body"><h3>Platillo 6</h3><p>...</p></div></div>
            </div>

            <div class="center-button">
                <button class="btn-yellow">Ver mas platillos</button>
            </div>
        </section>

        <div class="full-separator">
            <div class="orange-line"></div>
            <div class="yellow-line"></div>
        </div>
    </main>

    <script src="{{ asset('js/animaciones.js') }}"></script>
</body>
</html>