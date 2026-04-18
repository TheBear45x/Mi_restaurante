<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Comentarios - Mi Restaurant</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; margin: 0; padding: 20px; }
        .container { max-width: 900px; margin: auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; text-align: center; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #3498db; color: white; padding: 12px; text-align: left; }
        td { padding: 12px; border-bottom: 1px solid #ddd; color: #555; }
        tr:hover { background-color: #f1f1f1; }
        .badge-sucursal { background: #e67e22; color: white; padding: 5px 10px; border-radius: 20px; font-size: 0.85em; }
        .text-comment { font-style: italic; color: #2c3e50; font-weight: 500; }
        .empty-state { text-align: center; padding: 40px; color: #95a5a6; }
    </style>
</head>
<body>

<div class="container">
    <h2><i class="fas fa-comments me-2"></i> Mis Comentarios Históricos</h2>

    <table>
        <thead>
            <tr>
                <th><i class="fas fa-utensils"></i> Platillo</th>
                <th><i class="fas fa-comment-dots"></i> Mi Opinión</th>
                <th><i class="fas fa-calendar-alt"></i> Fecha</th>
            </tr>
        </thead>
        <tbody>
            @forelse($comentarios as $com)
                <tr>
                    <td>
                        <span class="badge-sucursal">
                            {{ $com->platillo->nombre ?? 'Platillo no encontrado' }}
                        </span>
                    </td>
                    <td class="text-comment">
                        {{-- CORRECCIÓN: Aquí usamos 'contenido' porque así lo guardas en tu controlador --}}
                        "{{ $com->comentario }}" 
                    </td>
                    <td>{{ $com->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="empty-state">
                        <i class="fas fa-info-circle fa-2x"></i><br>
                        Aún no has dejado comentarios en ningún platillo.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 20px; text-align: center;">
        <a href="{{ route('menu') }}" style="text-decoration: none; color: #3498db; font-weight: bold;">
            <i class="fas fa-arrow-left"></i> Volver al Menú
        </a>
    </div>
</div>

</body>
</html>