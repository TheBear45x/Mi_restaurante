<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Sucursal</title>
</head>
<body>
    <div class="container">
        <h1>Editar Sucursal</h1>
        <form action="{{ route('sucursales.actualizar', $sucursal->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label class="lables">Nombre:</label><br>
            <input type="text" name="nombre" value="{{ $sucursal->nombre }}" class="form-control" required><br>

            <label class="lables">Número de Sucursal:</label><br>
            <input type="text" name="numero_sucursal" value="{{ $sucursal->numero_sucursal }}" class="form-control" required><br>

            <label class="lables">Calle:</label><br>
            <input type="text" name="calle" value="{{ $sucursal->calle }}" class="form-control"><br>

            <label class="lables">Teléfono:</label><br>
            <input type="text" name="telefono" value="{{ $sucursal->telefono }}" class="form-control"><br>

            <label class="lables">Gerente:</label><br>
            <input type="text" name="gerente" value="{{ $sucursal->gerente }}" class="form-control"><br>

            <label class="lables">Código Postal:</label><br>
            <input type="text" name="codigo_postal" value="{{ $sucursal->codigo_postal }}" class="form-control"><br>

            <label class="lables">Estatus:</label><br>
            <select name="estatus" class="form-control">
                <option value="operacion" {{ $sucursal->estatus == 'operacion' ? 'selected' : '' }}>Operación</option>
                <option value="remodelacion" {{ $sucursal->estatus == 'remodelacion' ? 'selected' : '' }}>Remodelación</option>
                <option value="cierre_temporal" {{ $sucursal->estatus == 'cierre_temporal' ? 'selected' : '' }}>Cierre Temporal</option>
                <option value="cierre_permanente" {{ $sucursal->estatus == 'cierre_permanente' ? 'selected' : '' }}>Cierre Permanente</option>
            </select><br>

            <button type="submit" class="btn btn-primary">Guardar Edición</button>
        </form>
    </div>
</body>
</html>