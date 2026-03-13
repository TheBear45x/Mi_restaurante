<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Sucursal</title>
</head>
<body>
    <div class="container">
        <h1>Agregar Sucursal</h1>
        <form action="{{ route('sucursal.agregar') }}" method="POST">
            @csrf
            <label class="lables">Nombre:</label><br>
            <input type="text" name="nombre" class="form-control" required><br>

            <label class="lables">Número de Sucursal:</label><br>
            <input type="text" name="numero_sucursal" class="form-control" required><br>

            <label class="lables">Calle:</label><br>
            <input type="text" name="calle" class="form-control"><br>

            <label class="lables">Teléfono:</label><br>
            <input type="text" name="telefono" class="form-control"><br>

            <label class="lables">Gerente:</label><br>
            <input type="text" name="gerente" class="form-control"><br>

            <label class="lables">Código Postal:</label><br>
            <input type="text" name="codigo_postal" class="form-control"><br>

            <label class="lables">Estatus:</label><br>
            <select name="estatus" class="form-control">
                <option value="operacion">Operación</option>
                <option value="remodelacion">Remodelación</option>
                <option value="cierre_temporal">Cierre Temporal</option>
                <option value="cierre_permanente">Cierre Permanente</option>
            </select><br>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>
</html>