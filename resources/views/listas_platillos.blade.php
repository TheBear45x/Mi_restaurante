<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Menú - Platillos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .table-container { background: white; border-radius: 15px; padding: 20px; shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .img-thumbnail-custom { 
            width: 80px; height: 80px; object-fit: cover; border-radius: 10px;
            border: 2px solid #dee2e6;
        }
        .btn-action { border-radius: 8px; transition: transform 0.2s; }
        .btn-action:hover { transform: scale(1.05); }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark"><i class="fas fa-utensils me-2"></i>Menú de Platillos</h2>
            <p class="text-muted">Administre los productos disponibles en su restaurante</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('menu') }}" class="btn btn-outline-secondary btn-action">
                <i class="fas fa-arrow-left me-1"></i> Volver al Menú
            </a>
            <a href="{{ route('platillos.registro') }}" class="btn btn-primary btn-action shadow-sm">
                <i class="fas fa-plus me-1"></i> Nuevo Platillo
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-container shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Imagen</th>
                        <th>Nombre del Platillo</th>
                        <th>Descripción</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($platillos as $p)
                    <tr>
                        <td class="text-center">
                            @if($p->foto)
                                <img src="{{ asset('storage/platillos/' . $p->foto) }}" class="img-thumbnail-custom shadow-sm">
                            @else
                                <div class="img-thumbnail-custom bg-light d-flex align-items-center justify-content-center text-muted">
                                    <i class="fas fa-image fa-2x"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="fw-bold text-primary text-uppercase">{{ $p->nombre }}</span>
                        </td>
                        <td>
                            <small class="text-muted">{{ Str::limit($p->descripcion, 60) }}</small>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-success fs-6">${{ number_format($p->precio, 2) }}</span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('platillos.editar', $p->id) }}" class="btn btn-warning btn-sm btn-action text-white">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('platillos.eliminar', $p->id) }}" 
                                   class="btn btn-danger btn-sm btn-action" 
                                   onclick="return confirm('¿Está seguro de eliminar este platillo?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($platillos->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                <p class="text-muted">No hay platillos registrados todavía.</p>
            </div>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>