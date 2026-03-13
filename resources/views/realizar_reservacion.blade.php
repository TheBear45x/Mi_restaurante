<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Reservación</title>
</head>
<body>
    <form action="{{ route('reservaciones.guardar') }}" method="POST">
        @csrf
        <label for="cliente_id">Cliente:</label>
        <select name="cliente_id" id="cliente_id" required>
            <option value="">Seleccionar Cliente</option>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
            @endforeach
        </select>

        <label for="sucursal_id">Sucursal:</label>
        <select name="sucursal_id" id="sucursal_id" required>
            <option value="">Seleccionar Sucursal</option>
            @foreach($sucursales as $sucursal)
                <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
            @endforeach
        </select>

        <label for="fecha_hora">Fecha y Hora:</label>
        <input type="datetime-local" name="fecha_hora" id="fecha_hora" required>

        <label for="numero_personas">Número de Personas:</label>
        <input type="number" name="numero_personas" id="numero_personas" min="1" required>

        <label for="estatus">Estatus:</label>
        <select name="estatus" id="estatus" required>
            <option value="pendiente">Pendiente</option>
            <option value="confirmada">Confirmada</option>
            <option value="cancelada">Cancelada</option>
        </select>

        <button type="submit">Realizar Reservación</button>
    </form>
</body>
</html>