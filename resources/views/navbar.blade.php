<nav class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('menu') }}">🍴 Mi Restaurant</a>
        <div class="d-flex align-items-center text-white">
            <span class="me-3">Hola, {{ auth()->user()->name }} ({{ auth()->user()->tipo }})</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</nav>