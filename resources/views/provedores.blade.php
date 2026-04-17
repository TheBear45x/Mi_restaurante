<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proveedor - Mi Restaurant</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --bg-color: #f4f7f6;
            --success-color: #27ae60;
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
            max-width: 450px;
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
            margin-bottom: 18px;
        }

        .labels {
            display: block;
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            box-sizing: border-box;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .btn-container {
            display: flex;
            gap: 10px;
            margin-top: 25px;
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

        .btn-save {
            background-color: var(--success-color);
            color: white;
        }

        .btn-save:hover {
            background-color: #219150;
        }

        .btn-cancel {
            background-color: #95a5a6;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #7f8c8d;
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            right: 12px;
            top: 15px;
            color: #bdc3c7;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1><i class="fas fa-truck" style="color: var(--primary-color);"></i> Nuevo Proveedor</h1>
        <p style="color: #7f8c8d; font-size: 0.9rem;">Registro de proveedores de insumos</p>
    </div>
    <form action="{{ route('provedores.agregar') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="labels">Nombre de la Empresa:</label>
            <div class="input-with-icon">
                <input type="text" name="nombre" class="form-control" placeholder="Ej: Distribuidora Sol" required>
                <i class="fas fa-building"></i>
            </div>
        </div>
        <div class="form-group">
            <label class="labels">Persona Encargada:</label>
            <div class="input-with-icon">
                <input type="text" name="encargado" class="form-control" placeholder="Nombre del contacto" required>
                <i class="fas fa-user"></i>
            </div>
        </div>
        <div class="form-group">
            <label class="labels">Teléfono de Contacto:</label>
            <div class="input-with-icon">
                <input type="text" name="telefono" class="form-control" placeholder="695 123 4567">
                <i class="fas fa-phone"></i>
            </div>
        </div>
        <div class="form-group">
            <label class="labels">Correo Electrónico:</label>
            <div class="input-with-icon">
                <input type="email" name="correo" class="form-control" placeholder="proveedor@correo.com">
                <i class="fas fa-envelope"></i>
            </div>
        </div>
        <div class="form-group">
            <label class="labels">Estatus del Proveedor:</label>
            <select name="estatus" class="form-control" required>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
        <div class="btn-container">
            <a href="{{ route('menu') }}" class="btn btn-cancel">
                <i class="fas fa-times"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-save">
                <i class="fas fa-save"></i> Guardar
            </button>
        </div>
    </form>
</div>

</body>
</html>