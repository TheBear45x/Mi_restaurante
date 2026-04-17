<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Reservación - Mi Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --primary: #f1c40f; --dark: #2d3436; }
        body { 
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?w=1200');
            background-size: cover;
            background-attachment: fixed;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card-reserva {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
        }
        .header-reserva {
            background: var(--dark);
            color: white;
            border-radius: 25px 25px 0 0;
            padding: 40px 20px;
        }
        .form-control, .form-select {
            border-radius: 12px;
            padding: 12px 15px;
            border: 2px solid #eee;
            transition: 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: none;
        }
        .btn-confirmar {
            background: var(--primary);
            color: var(--dark);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 15px;
            border-radius: 15px;
            border: none;
            transition: 0.4s;
        }
        .btn-confirmar:hover {
            background: var(--dark);
            color: white;
            transform: scale(1.02);
        }
        .btn-volver {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
        }
        .btn-volver:hover { color: var(--primary); }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            
            <div class="text-center mb-4">
                <a href="{{ route('menu') }}" class="btn-volver">
                    <i class="fas fa-arrow-left me-2"></i> VOLVER AL MENÚ PRINCIPAL
                </a>
            </div>

            <div class="card card-reserva overflow-hidden">
                <div class="header-reserva text-center">
                    <div class="mb-3">
                        <i class="fas fa-calendar-check fa-4x text-warning"></i>
                    </div>
                    <h2 class="fw-bold">RESERVACIONES</h2>
                    <p class="mb-0 opacity-75">Aparta tu lugar y vive la mejor experiencia</p>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('reservas.guardar') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold"><i class="fas fa-store me-2 text-warning"></i>Selecciona la Sucursal</label>
                            <select name="sucursal_id" class="form-select" required>
                                <option value="" selected disabled>¿A cuál sucursal asistirás?</option>
                                @foreach($sucursales as $s)
                                    <option value="{{ $s->id }}">{{ $s->nombre }} - {{ $s->direccion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-calendar-day me-2 text-warning"></i>Fecha</label>
                                <input type="date" name="fecha_hora" class="form-control" required min="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-users me-2 text-warning"></i>Personas</label>
                                <input type="number" name="numero_personas" class="form-control" min="1" max="20" value="2" required>
                            </div>
                        </div>

                        <div class="alert alert-info border-0 rounded-4 small">
                            <i class="fas fa-info-circle me-2"></i> 
                            Tu reservación quedará en estado <strong>Pendiente</strong> hasta que sea confirmada por nuestro equipo.
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-confirmar shadow-lg">
                                <i class="fas fa-check-circle me-2"></i> CONFIRMAR RESERVACIÓN
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-4 text-white-50">
                <small>© 2026 Mi Restaurant - Ingeniería en Tecnologías (UTEsc)</small>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>