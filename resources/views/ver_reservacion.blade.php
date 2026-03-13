<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservaciones</title>
</head>
<body>

    <h2>Mis Reservaciones</h2>

    <table>
        <thead>
            <tr>
                <th>Sucursal</th>
                <th>Fecha y Hora</th>
                <th>Personas</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservaciones as $res)
            <tr>
                <td>{{ $res->sucursal->nombre ?? 'No especificada' }}</td>
                <td>{{ $res->fecha_hora }}</td>
                <td>{{ $res->numero_personas }}</td>
                <td>{{ $res->estatus }}</td>
                <td>
                    <a href="{{ route('reservaciones.editar', $res->id) }}">Editar</a>

                    <form action="{{ route('reservaciones.eliminar', $res->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar esta reservación?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Aún no tienes reservaciones registradas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>