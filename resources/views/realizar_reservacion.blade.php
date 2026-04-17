<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Reservación - My Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .card-reserva { border: none; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .btn-primary { background: #2d3436; border: none; padding: 12px; border-radius: 10px; font-weight: bold; }
        .btn-primary:hover { background: #f1c40f; color: #2d3436; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <a href="{{ route('menu') }}" class="text-decoration-none text-muted">
                    <i class="fas fa-arrow-left me-2"></i> Volver al Menú
                </a>
            </div>

            <div class="card card-reserva p-4 p-md-5 bg-white">
                <h2 class="text-center fw-bold mb-4">RESERVACIÓN</h2>
                
     <form action="{{ route('reservaciones.guardar') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label class="form-label fw-bold">Sucursal</label>
        <select name="sucursal_id" class="form-select" required>
            <option value="">Selecciona la sucursal...</option>
            @foreach($sucursales as $s)
                <option value="{{ $s->id }}">{{ $s->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label fw-bold">Fecha y Hora</label>
            <input type="datetime-local" name="fecha_hora" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-bold">¿Cuántas personas?</label>
            <input type="number" name="numero_personas" class="form-control" min="1" max="10" required>
        </div>
    </div>

    <button type="submit" class="btn btn-warning w-100 fw-bold">CONFIRMAR RESERVACIÓN</button>
</form>
            </div>
        </div>
    </div>
</div>

</body>
</html>