<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proveedor</title>
</head>
<body>
    <form action="{{ route('provedores.agregar') }}" method="POST">
    @csrf
    <label>Nombre:</label><br>
    <input type="text" name="nombre" class="form-control" required><br>

    <label>Encargado:</label><br>
    <input type="text" name="encargado" class="form-control" required><br>

    <label>Teléfono:</label><br>
    <input type="text" name="telefono" class="form-control"><br>

    <label>Correo:</label><br>
    <input type="email" name="correo" class="form-control"><br>

    <label>Estatus:</label>
    <select name="estatus" class="form-control" required>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
</body>
</html>