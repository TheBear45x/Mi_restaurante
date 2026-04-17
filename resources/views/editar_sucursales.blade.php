<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sucursal - Mi Restaurant</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --bg-color: #f4f7f6;
            --warning-color: #f39c12; /* Color naranja para edición */
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            color: var(--secondary-color);
            font-size: 1.8rem;
            margin: 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .labels {
            display: block;
            font-weight: 600;
            color: #555;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--warning-color);
            box-shadow: 0 0 0 3px rgba(243, 156, 18, 0.1);
        }

        .btn-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            text-align: center;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .btn-update {
            background-color: var(--warning-color);
            color: white;
        }

        .btn-update:hover {
            background-color: #d68910;
        }

        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1><i class="fas fa-edit" style="color: var(--warning-color);"></i> Editar Sucursal</h1>
        <p style="color: #7f8c8d; font-size: 0.9rem;">Modificando: <strong>{{ $sucursal->nombre }}</strong></p>
    </div>

    <form action="{{ route('sucursales.actualizar', $sucursal->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="labels">Nombre:</label>
            <input type="text" name="nombre" value="{{ $sucursal->nombre }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="labels">Número de Sucursal:</label>
            <input type="text" name="numero_sucursal" value="{{ $sucursal->numero_sucursal }}" class="form-control" required>
        </div>

        <div style="display: flex; gap: 10px;">
            <div class="form-group" style="flex: 2;">
                <label class="labels">Calle:</label>
                <input type="text" name="calle" value="{{ $sucursal->calle }}" class="form-control">
            </div>
            <div class="form-group" style="flex: 1;">
                <label class="labels">C.P.:</label>
                <input type="text" name="codigo_postal" value="{{ $sucursal->codigo_postal }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="labels">Teléfono:</label>
            <input type="text" name="telefono" value="{{ $sucursal->telefono }}" class="form-control">
        </div>

        <div class="form-group">
            <label class="labels">Gerente:</label>
            <input type="text" name="gerente" value="{{ $sucursal->gerente }}" class="form-control">
        </div>

        <div class="form-group">
            <label class="labels">Estatus Actual:</label>
            <select name="estatus" class="form-control">
                <option value="operacion" {{ $sucursal->estatus == 'operacion' ? 'selected' : '' }}>Operación</option>
                <option value="remodelacion" {{ $sucursal->estatus == 'remodelacion' ? 'selected' : '' }}>Remodelación</option>
                <option value="cierre_temporal" {{ $sucursal->estatus == 'cierre_temporal' ? 'selected' : '' }}>Cierre Temporal</option>
                <option value="cierre_permanente" {{ $sucursal->estatus == 'cierre_permanente' ? 'selected' : '' }}>Cierre Permanente</option>
            </select>
        </div>

        <div class="btn-container">
            <a href="{{ route('sucursal.vista') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-update">
                <i class="fas fa-save"></i> Guardar Edición
            </button>
        </div>
    </form>
</div>

</body>
</html>