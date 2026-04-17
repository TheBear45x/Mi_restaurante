<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control - My Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --admin-bg: #f4f7f6; --sidebar-color: #2c3e50; }
        body { background-color: var(--admin-bg); }
        .sidebar-admin { background: var(--sidebar-color); min-height: 100vh; color: white; }
        .nav-pills .nav-link { color: #bdc3c7; border-radius: 0; margin-bottom: 5px; text-align: left; }
        .nav-pills .nav-link.active { background-color: #f1c40f; color: #2c3e50; font-weight: bold; }
        .card-stats { border: none; border-left: 5px solid #f1c40f; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 p-0 sidebar-admin">
            <div class="p-4 text-center">
                <h4 class="fw-bold text-warning">ADMIN</h4>
                <p class="small">My Restaurant System</p>
            </div>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-ventas"><i class="fas fa-chart-line me-2"></i> Detalle Ventas</button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-platillos"><i class="fas fa-utensils me-2"></i> Platillos</button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-proveedores"><i class="fas fa-truck me-2"></i> Proveedores</button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-sucursales"><i class="fas fa-store me-2"></i> Sucursales</button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-usuarios"><i class="fas fa-users me-2"></i> Usuarios</button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-comentarios"><i class="fas fa-comments me-2"></i> Comentarios</button>
                <hr>
                <a href="{{ route('menu') }}" class="nav-link text-info"><i class="fas fa-arrow-left me-2"></i> Volver al Menú</a>
            </div>
        </div>

        <div class="col-md-10 p-4">
            <div class="tab-content" id="v-pills-tabContent">
                
                <div class="tab-pane fade show active" id="tab-ventas">
                    <h3 class="mb-4">Reporte de Ventas</h3>
                    <div class="table-responsive bg-white p-3 rounded shadow-sm">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr><th>ID</th><th>Cliente</th><th>Total</th><th>Fecha</th><th>Estado</th></tr>
                            </thead>
                            <tbody>
                                @foreach($ventas as $v)
                                <tr><td>#{{ $v->id }}</td><td>{{ $v->user->name }}</td><td>${{ $v->total }}</td><td>{{ $v->created_at }}</td><td><span class="badge bg-success">Completado</span></td></tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-platillos">
                    <div class="d-flex justify-content-between mb-3">
                        <h3>Gestión de Menú</h3>
                        <button class="btn btn-warning fw-bold">+ Nuevo Platillo</button>
                    </div>
                    <div class="row">
                        @foreach($platillos as $p)
                        <div class="col-md-3 mb-3">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="{{ asset('storage/'.$p->foto) }}" class="card-img-top" height="150" style="object-fit: cover;">
                                <div class="card-body text-center p-2">
                                    <h6 class="fw-bold">{{ $p->nombre }}</h6>
                                    <p class="text-warning mb-1">${{ $p->precio }}</p>
                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-proveedores">
                    <h3>Lista de Proveedores</h3>
                    <div class="bg-white p-3 rounded shadow-sm">
                        <table class="table">
                            <thead><tr><th>Empresa</th><th>Contacto</th><th>Insumo</th></tr></thead>
                            <tbody>
                                @foreach($proveedores as $prov)
                                <tr><td>{{ $prov->nombre }}</td><td>{{ $prov->telefono }}</td><td>{{ $prov->tipo }}</td></tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-sucursales">
                    <h3>Sucursales</h3>
                    <div class="row">
                        @foreach($sucursales as $s)
                        <div class="col-md-4">
                            <div class="card p-3 mb-3 shadow-sm card-stats">
                                <h5>{{ $s->nombre }}</h5>
                                <p class="small text-muted">{{ $s->direccion }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-usuarios">
                    <h3>Usuarios Registrados</h3>
                    <div class="bg-white p-3 rounded shadow-sm">
                        <table class="table align-middle">
                            <thead><tr><th>Avatar</th><th>Nombre</th><th>Email</th><th>Rol</th></tr></thead>
                            <tbody>
                                @foreach($usuarios as $u)
                                <tr>
                                    <td><img src="{{ $u->avatar }}" width="40" class="rounded-circle"></td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td><span class="badge {{ $u->rol == 'admin' ? 'bg-danger' : 'bg-primary' }}">{{ $u->rol }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-comentarios">
                    <h3>Buzón de Comentarios</h3>
                    <div class="alert alert-secondary">No hay comentarios nuevos hoy.</div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>