<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Sucursales - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --accent: #3498db;
            --success: #27ae60;
            --danger: #e74c3c;
            --warning: #f1c40f;
            --light: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }

        .main-container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.05);
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            border-bottom: 2px solid var(--light);
            padding-bottom: 15px;
        }

        h1 { color: var(--primary); margin: 0; font-size: 1.8rem; }

        /* Botones Generales */
        .btn {
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-add { background: var(--success); color: white; }
        .btn-add:hover { background: #219150; transform: translateY(-2px); }

        .btn-back { background: #95a5a6; color: white; }
        .btn-back:hover { background: #7f8c8d; }

        /* Estilo de la Tabla */
        .table-responsive { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: var(--light);
            color: var(--primary);
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #dee2e6;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            color: #444;
        }

        tr:hover { background-color: #f9fbff; }

        /* Badges de Estatus */
        .badge {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-operacion { background: #d4edda; color: #155724; }
        .status-remodelacion { background: #fff3cd; color: #856404; }
        .status-cierre_temporal { background: #f8d7da; color: #721c24; }
        .status-cierre_permanente { background: #343a40; color: white; }

        /* Botones de Acción en tabla */
        .action-btn {
            padding: 6px 10px;
            border-radius: 5px;
            color: white;
            font-size: 0.85rem;
        }
        .edit-btn { background: var(--accent); }
        .delete-btn { background: var(--danger); }

        .action-btn:hover { opacity: 0.8; }
    </style>
</head>
<body>

<div class="main-container">
    <div class="header-section">
        <div>
            <a href="{{ route('menu') }}" class="btn btn-back">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
            <h1><i class="fas fa-city"></i> Listado de Sucursales</h1>
        </div>
        <a href="{{ route('sucursal.agregar') }}" class="btn btn-add">
            <i class="fas fa-plus-circle"></i> Agregar Sucursal
        </a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>N° Sucursal</th>
                    <th>Calle</th>
                    <th>Teléfono</th>
                    <th>Gerente</th>
                    <th>C.P.</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sucursales as $sucursal)
                <tr>
                    <td><strong>{{ $sucursal->nombre }}</strong></td>
                    <td><span style="color: #7f8c8d;">#{{ $sucursal->numero_sucursal }}</span></td>
                    <td>{{ $sucursal->calle }}</td>
                    <td>{{ $sucursal->telefono }}</td>
                    <td><i class="fas fa-user-tie"></i> {{ $sucursal->gerente }}</td>
                    <td>{{ $sucursal->codigo_postal }}</td>
                    <td>
                        <span class="badge status-{{ $sucursal->estatus }}">
                            {{ str_replace('_', ' ', $sucursal->estatus) }}
                        </span>
                    </td>
                    <td style="display: flex; gap: 5px;">
                        <a href="{{ route('sucursales.editar', $sucursal->id) }}" class="btn action-btn edit-btn" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        
                        <form action="{{ route('sucursales.eliminar', $sucursal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn action-btn delete-btn" onclick="return confirm('¿Seguro que quieres eliminar esta sucursal?')" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>