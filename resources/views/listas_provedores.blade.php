<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proveedores - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --accent: #3498db;
            --success: #27ae60;
            --danger: #e74c3c;
            --warning: #f39c12;
            --light: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }

        .main-container {
            max-width: 1100px;
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

        /* Botones */
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

        /* Tabla */
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
        }
        .status-activo { background: #d4edda; color: #155724; }
        .status-inactivo { background: #f8d7da; color: #721c24; }

        /* Botones de Acción */
        .action-btn {
            padding: 7px 12px;
            border-radius: 6px;
            color: white;
            font-size: 0.85rem;
        }
        .edit-btn { background: var(--warning); }
        .edit-btn:hover { background: #d68910; }
    </style>
</head>
<body>

<div class="main-container">
    <div class="header-section">
        <div>
            <a href="{{ route('menu') }}" class="btn btn-back">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
            <h1><i class="fas fa-truck-loading"></i> Lista de Proveedores</h1>
        </div>
        <a href="{{ route('provedores.agregar') }}" class="btn btn-add">
            <i class="fas fa-plus-circle"></i> Nuevo Proveedor
        </a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Nombre Empresa</th>
                    <th>Encargado</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($provedores as $p)
                <tr>
                    <td><strong>{{ $p->nombre }}</strong></td>
                    <td>{{ $p->encargado }}</td>
                    <td><i class="fas fa-phone-alt" style="font-size: 0.8rem; color: #999;"></i> {{ $p->telefono }}</td>
                    <td><i class="fas fa-envelope" style="font-size: 0.8rem; color: #999;"></i> {{ $p->correo }}</td>
                    <td>
                        <span class="badge {{ $p->estatus ? 'status-activo' : 'status-inactivo' }}">
                            {{ $p->estatus ? 'Activo' : 'Inactivo' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('provedores.editar', $p->id) }}" class="btn action-btn edit-btn" title="Editar Proveedor">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>