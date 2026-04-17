<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservaciones - Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --accent: #3498db;
            --danger: #e74c3c;
            --secondary: #95a5a6;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .card-container {
            max-width: 1000px;
            margin: 20px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
        }

        h2 { color: var(--primary); margin: 0; }

        table { width: 100%; border-collapse: collapse; }
        th { background-color: #f1f4f8; padding: 15px; text-align: left; }
        td { padding: 15px; border-bottom: 1px solid #eee; }

        /* Botones */
        .btn {
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-back { background: var(--secondary); color: white; margin-bottom: 10px; }
        .btn-back:hover { background: #7f8c8d; }

        .btn-edit { background: var(--accent); color: white; }
        .btn-delete { background: var(--danger); color: white; }

        .status-badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        .status-pendiente { background: #fff3cd; color: #856404; }
        .status-confirmada { background: #d4edda; color: #155724; }
    </style>
</head>
<body>

<div class="card-container">
    <div class="header-flex">
        <h2><i class="fas fa-calendar-alt"></i> Mis Reservaciones</h2>
        <a href="{{ route('menu') }}" class="btn btn-back">
            <i class="fas fa-arrow-left"></i> Volver al Menú
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Sucursal</th>
                <th>Fecha y Hora</th>
                <th>Personas</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservaciones as $res)
            <tr>
                <td><strong>{{ $res->sucursal->nombre ?? 'No especificada' }}</strong></td>
                <td>{{ date('d/m/Y H:i', strtotime($res->fecha_hora)) }}</td>
                <td>{{ $res->numero_personas }}</td>
                <td>
                    <span class="status-badge status-{{ $res->estatus }}">
                        {{ ucfirst($res->estatus) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('reservaciones.editar', $res->id) }}" class="btn btn-edit">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('reservaciones.eliminar', $res->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('¿Eliminar reserva?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center; padding: 30px;">No tienes reservaciones.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px; text-align: center;">
        <p style="color: #7f8c8d; font-size: 0.9rem;">¿Necesitas hacer otra reservación? 
            <a href="{{ route('menu') }}" style="color: var(--accent); font-weight: bold;">Haz clic aquí</a>
        </p>
    </div>
</div>

</body>
</html>