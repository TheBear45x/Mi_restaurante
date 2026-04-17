<!DOCTYPE html>
<html lang="es" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8">
    <title>Mi Restaurant - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --primary: #f1c40f; --dark: #2d3436; }
        body { background: #f8f9fa; font-family: 'Segoe UI', sans-serif; overflow-x: hidden; }
        
        .sidebar { position: fixed; left: -250px; width: 250px; height: 100%; background: white; transition: 0.3s; z-index: 1050; box-shadow: 2px 0 10px rgba(0,0,0,0.1); padding: 20px; }
        .sidebar.active { left: 0; }
        .menu-btn { cursor: pointer; font-size: 1.5rem; color: white; background: rgba(0,0,0,0.6); padding: 10px 18px; border-radius: 12px; position: fixed; top: 20px; left: 20px; z-index: 1000; transition: 0.3s; }
        .menu-btn:hover { background: var(--primary); color: var(--dark); }
        
        .user-profile { text-align: center; border-bottom: 1px solid #eee; padding-bottom: 20px; margin-bottom: 20px; }
        .user-profile img { width: 85px; height: 85px; border-radius: 50%; border: 3px solid var(--primary); object-fit: cover; }

        .hero { background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1200'); height: 75vh; background-size: cover; background-position: center; display: flex; align-items: center; justify-content: center; color: white; text-align: center; }
        section { padding: 90px 0; }
        .section-title { margin-bottom: 60px; font-weight: 800; position: relative; text-transform: uppercase; }
        .section-title::after { content: ''; width: 70px; height: 5px; background: var(--primary); position: absolute; bottom: -12px; left: 50%; transform: translateX(-50%); }

        .card-custom { border: none; border-radius: 20px; transition: 0.3s; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .card-custom:hover { transform: translateY(-10px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }

        .comment-box { background: #f1f2f6; border-radius: 10px; padding: 10px; margin-top: 10px; max-height: 150px; overflow-y: auto; text-align: left; }
        
        .social-bar { background: var(--dark); color: white; padding: 50px 0; }
    </style>
</head>
<body>

    <div class="menu-btn" onclick="toggleMenu()"><i class="fas fa-bars"></i></div>

    <div class="sidebar" id="sidebar">
        <div class="user-profile">
            <img src="{{ auth()->user()->avatar ?? 'https://via.placeholder.com/80' }}" alt="Avatar">
            <h5 class="mt-3 mb-1">{{ auth()->user()->name }}</h5>
            <span class="badge {{ auth()->user()->rol == 'admin' ? 'bg-danger' : 'bg-warning text-dark' }}">
                {{ strtoupper(auth()->user()->rol) }}
            </span>
        </div>
        
        <div class="list-group list-group-flush">
            <a href="#inicio" class="list-group-item list-group-item-action border-0" onclick="toggleMenu()"><i class="fas fa-home me-2"></i> Inicio</a>
            <a href="#platillos" class="list-group-item list-group-item-action border-0" onclick="toggleMenu()"><i class="fas fa-shopping-basket me-2"></i> Realizar Pedido</a>
            <a href="#sucursales" class="list-group-item list-group-item-action border-0" onclick="toggleMenu()"><i class="fas fa-calendar-check me-2"></i> Reservación</a>
            <a href="{{ route('reservaciones.ver') }}" class="list-group-item list-group-item-action border-0" onclick="toggleMenu()"><i class="fas fa-history me-2"></i> Mis Reservaciones</a>
            <a href="{{ route('comentarios.mios') }}" class="list-group-item list-group-item-action border-0" onclick="toggleMenu()"><i class="fas fa-comments me-2"></i> Mis Comentarios</a>
            <a href="{{ route('pedidos.usuario') }}" class="list-group-item list-group-item-action border-0" onclick="toggleMenu()"><i class="fas fa-shopping-bag me-2"></i> Mis Pedidos</a>

            @if(auth()->user()->rol == 'admin')
                <hr>
                <a href="{{ route('panel_admin') }}" class="list-group-item list-group-item-action border-0"><i class="fas fa-user-shield me-2"></i> Panel Admin</a>
                <a href="{{ route('sucursal.vista') }}" class="list-group-item list-group-item-action border-0"><i class="fas fa-building me-2"></i> Sucursales</a>
                <a href="{{ route('sucursales.lista') }}" class="list-group-item list-group-item-action border-0"><i class="fas fa-list me-2"></i> Lista de Sucursales</a>
                <a href="{{ route('provedores.vista') }}" class="list-group-item list-group-item-action border-0"><i class="fas fa-utensils me-2"></i> Provedores</a>
                <a href="{{ route('provedores.lista') }}" class="list-group-item list-group-item-action border-0"><i class="fas fa-list me-2"></i> Lista de Provedores</a>
                <a href="{{ route('platillos.registro') }}" class="list-group-item list-group-item-action border-0"><i class="fas fa-utensil-spoon me-2"></i> Platillos</a>
                <a href="{{ route('platillos.lista') }}" class="list-group-item list-group-item-action border-0"><i class="fas fa-list me-2"></i> Lista de Platillos</a>
            @endif

            <form action="{{ route('logout') }}" method="POST" class="mt-4 px-2">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100"><i class="fas fa-sign-out-alt me-2"></i> Salir</button>
            </form>
        </div>
    </div>

    <div id="inicio" class="hero">
        <div class="container">
            <h1 class="display-1 fw-bold">Hola, {{ explode(' ', auth()->user()->name)[0] }}</h1>
            <p class="lead fs-3 mb-4">MI - RESTAURANT</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('platillos.lista') }}" class="btn btn-warning btn-lg px-4 fw-bold shadow">
                    <i class="fas fa-utensils me-2"></i> REALIZAR PEDIDO
                </a>
                <a href="#sucursales" class="btn btn-outline-light btn-lg px-4 fw-bold shadow">
                    <i class="fas fa-chair me-2"></i> RESERVAR
                </a>
            </div>
        </div>
    </div>

    <section id="platillos" class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Nuestros Platillos</h2>
        </div>
        <div class="row g-4">
            @foreach($platillos as $p)
            <div class="col-md-4">
                <div class="card card-custom h-100 overflow-hidden bg-white">
                    <img src="{{ asset('img/platillos/' . $p->foto) }}" class="card-img-top" style="height: 220px; object-fit: cover;">
                    <div class="card-body">
                        <h4 class="fw-bold">{{ $p->nombre }}</h4>
                        <p class="text-muted small">{{ $p->descripcion }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="text-warning fw-bold mb-0">${{ number_format($p->precio, 2) }}</h3>
                            <a href="{{ route('ventas.crear', ['id' => $p->id]) }}" class="btn btn-dark fw-bold btn-sm shadow-sm">
                                <i class="fas fa-shopping-cart me-1"></i> ORDENAR
                            </a>
                        </div>
                        
                        <div class="mt-3">
                            <h6 class="fw-bold small border-bottom pb-1"><i class="fas fa-comments me-2"></i>Comentarios</h6>
                            <div class="comment-box small">
                                @forelse($p->comentarios as $com)
                                    <div class="mb-2 border-bottom pb-1">
                                        <span class="fw-bold text-dark">{{ $com->user->name }}:</span> 
                                        <span class="text-secondary">{{ $com->comentario }}</span>
                                    </div>
                                @empty
                                    <p class="text-muted x-small">Sé el primero en comentar...</p>
                                @endforelse
                            </div>
                            <form action="{{ route('comentarios.guardar') }}" method="POST" class="mt-2 d-flex gap-1">
                                @csrf
                                <input type="hidden" name="platillo_id" value="{{ $p->id }}">
                                <input type="text" name="contenido" class="form-control form-control-sm" placeholder="Comentar..." required>
                                <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section id="sucursales" class="bg-light">
        <div class="container text-center">
            <h2 class="section-title">Sucursales en Escuinapa</h2>
            <div class="row g-4 mb-5">
                @foreach($sucursales as $s)
                <div class="col-md-4">
                    <div class="p-4 bg-white card-custom border-bottom border-4 border-warning shadow-sm h-100 text-center">
                        <i class="fas fa-store fa-3x text-warning mb-3"></i>
                        <h5 class="fw-bold text-uppercase">{{ $s->nombre }}</h5>
                        <p class="text-muted small mb-4">{{ $s->direccion }}</p>
                        
                        <div class="d-grid mt-auto">
                            <a href="{{ route('reservaciones.crear') }}" class="btn btn-dark fw-bold">
                                <i class="fas fa-calendar-alt me-2"></i> REGISTRAR RESERVACIÓN
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="rounded-4 shadow-lg overflow-hidden border border-white border-4" style="height: 350px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14695.660123456!2d-105.7766!3d22.8333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjLCsDUwJzAwLjAiTiAxMDXCsDQ2JzM1LjgiVw!5e0!3m2!1ses!2smx!4v123456789" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <div class="social-bar text-center mt-5">
        <h3 class="mb-4 fw-bold">CONÓCENOS MÁS</h3>
        <div class="social-icons mb-4">
            <a href="#" class="text-white mx-3 fs-3"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-white mx-3 fs-3"><i class="fab fa-whatsapp"></i></a>
            <a href="#" class="text-white mx-3 fs-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white mx-3 fs-3"><i class="fab fa-tiktok"></i></a>
        </div>
        <p class="mt-4 text-secondary small">© 2026 My Restaurant - Escuinapa, Sinaloa</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleMenu() { document.getElementById('sidebar').classList.toggle('active'); }
    </script>
</body>
</html>