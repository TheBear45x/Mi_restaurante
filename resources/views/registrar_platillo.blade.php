<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Platillo - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #e67e22; 
            --secondary-color: #2c3e50;
            --bg-color: #f4f6f9;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
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
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        h1 {
            color: var(--secondary-color);
            font-size: 1.7rem;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .form-group { margin-bottom: 20px; }

        .labels {
            display: block;
            font-weight: 600;
            color: #444;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 2px solid #eee;
            border-radius: 10px;
            font-size: 1rem;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 8px rgba(230, 126, 34, 0.2);
        }

        textarea.form-control { resize: none; height: 100px; }

        .btn-container {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 10px;
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

        .btn-save { background-color: var(--primary-color); color: white; }
        .btn-save:hover { background-color: #d35400; transform: translateY(-2px); }

        .btn-back { background-color: #95a5a6; color: white; }
        .btn-back:hover { background-color: #7f8c8d; }

        .input-icon-wrapper { position: relative; }
        .input-icon-wrapper i {
            position: absolute;
            right: 15px;
            top: 15px;
            color: #ccc;
        }

        /* Enlace superior para ir directo a la lista */
        .list-link {
            display: block;
            text-align: right;
            margin-bottom: 10px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('platillos.lista') }}" class="list-link">
        <i class="fas fa-list"></i> Ver Lista de Platillos
    </a>

    <div class="header">
        <h1><i class="fas fa-hamburger"></i> Registrar Platillo</h1>
        <p style="color: #7f8c8d; font-size: 0.85rem; margin-top: 5px;">Agregue un nuevo manjar al menú</p>
    </div>

    <form action="{{ route('platillos.agregar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label class="labels">Nombre del Platillo:</label>
            <div class="input-icon-wrapper">
                <input type="text" name="nombre" class="form-control" placeholder="Ej: Enchiladas Suizas" required>
                <i class="fas fa-signature"></i>
            </div>
        </div>

        <div class="form-group">
            <label class="labels">Descripción Detallada:</label>
            <textarea name="descripcion" class="form-control" placeholder="Describe los ingredientes..." required></textarea>
        </div>

        <div class="form-group">
            <label class="labels">Precio de Venta ($):</label>
            <div class="input-icon-wrapper">
                <input type="number" step="0.01" name="precio" class="form-control" placeholder="0.00" required>
                <i class="fas fa-tag"></i>
            </div>
        </div>

        <div class="form-group">
            <label class="labels">Fotografía del Platillo:</label>
            <input type="file" name="foto" class="form-control" accept="image/*" required>
            <small style="color: #95a5a6;">Formatos: JPG, PNG, WEBP.</small>
        </div>

        <div class="btn-container">
            <a href="{{ route('menu') }}" class="btn btn-back">
                <i class="fas fa-home"></i> Ir al Menú
            </a>
            <button type="submit" class="btn btn-save">
                <i class="fas fa-cloud-upload-alt"></i> Guardar y Ver Lista
            </button>
        </div>
    </form>
</div>

</body>
</html>