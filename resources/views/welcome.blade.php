<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mneu-Opciones</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <span class="user-name">{{ Auth::user()?->name }}</span>

<nav class="navbar">
    <div class="nav-left">
        <img src="{{ asset('img/logo.png') }}" alt="logo">
        <h2>My Restaurant</h2>
    </div>

    <ul class="nav-center">
        <li>Inicio</li>
        <li>Menú</li>
        <li>Reservaciones</li>
        <li>Ventas</li>
        <li>Sucursales</li>
        <li>Sobre nosotros</li>
    <a href="{{route('platillo.nuevo')}}">Platillos</a>
    </ul>

    <div class="nav-right">
        <a class="btn-login" href="{{route('login')}}">Iniciar sesión</a>
        {{-- <button class="btn-login" href="{{route('login')}}">Iniciar sesión</button> --}}
    {{-- </div> --}}
<form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn-logout">
        Cerrar Sesión
    </button>
</form>
    </div>

</nav>
<div class="hero">

    <div class="carousel">
        <img src="{{ asset('img/sucursal1.jpg') }}" class="active">
        <img src="{{ asset('img/sucursal2.jpg') }}">
        <img src="{{ asset('img/sucursal3.jpg') }}">
    </div>

    <div class="container">
        <div>
            <h1 class="title">
                Le damos la bienvenida a 
                <span class="highlight">My Restaurant.</span> <br>
                Es un placer atenderle.
            </h1>

            <button class="btn-primary">Reservar</button>
            <button class="btn-secondary">Ordenar</button>
        </div>

        {{-- <div class="image-container">
            <img src="{{ asset('img/platillo.png') }}" alt="food">
        </div> --}}
    </div>

</div>
<div class="horarios">
    <span class="dot"></span>
    Abierto: 10:00am - 11:00pm
</div>
{{-- <section class="t-platillos">
    <h2>Platillos populares</h2>
    <div class="header-platillos">
        <div class="flechas">
            <button id="prev">←</button>
            <button id="next">→</button>
        </div>
    </div>
    <div class="cards" id="slider">
        <div class="card">
            <img src="/img/platillo1.jpg">
            <p>Pasta</p>
            <span>$120</span>
        </div>

        <div class="card">
            <img src="/img/platillo2.jpg">
            <p>Ensalada</p>
            <span>$90</span>
        </div>
    </div>
</section> --}}
<script>
let index = 0;
const images = document.querySelectorAll('.carousel img');

setInterval(() => {
    images[index].classList.remove('active');
    index = (index + 1) % images.length;
    images[index].classList.add('active');
}, 4000);
</script>
<script>
const slider = document.getElementById('slider');
const next = document.getElementById('next');
const prev = document.getElementById('prev');

next.addEventListener('click', () => {
    slider.scrollLeft += 220; // mueve a la derecha
});

prev.addEventListener('click', () => {
    slider.scrollLeft -= 220; // mueve a la izquierda
});
</script>
</body>
</html>