<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Provedor</title>
</head>
<body>
    <<form action="{{ route('provedores.actualizar', $provedor->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ $provedor->nombre }}" class="form-control">

    <label>Encargado:</label>
    <input type="text" name="encargado" value="{{ $provedor->encargado }}" class="form-control">

    <label>Teléfono:</label>
    <input type="text" name="telefono" value="{{ $provedor->telefono }}" class="form-control">

    <label>Correo:</label>
    <input type="email" name="correo" value="{{ $provedor->correo }}" class="form-control">

    <label>Estatus:</label>
    <select name="estatus" class="form-control">
        <option value="1" {{ $provedor->estatus == 1 ? 'selected' : '' }}>Activo</option>
        <option value="0" {{ $provedor->estatus == 0 ? 'selected' : '' }}>Inactivo</option>
    </select>

    <button type="submit" class="btn btn-success">Actualizar</button>
</form>
    </div>
</body>
</html>