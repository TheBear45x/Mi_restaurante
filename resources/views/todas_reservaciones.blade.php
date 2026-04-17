<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las Reservaciones (de los clientes)</title>
</head>
<body>

    <h2>Todas las Reservaciones de los Clientes</h2>

    <table>
        <thead>
            <tr>
                <th>Nombre del Cliente</th>
                <th>Sucursal</th>
                <th>Fecha y Hora</th>
                <th>Personas</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservaciones as $res)
            <tr>
                {{-- Nombre del cliente (usando la relación) --}}
                <td>{{ $res->cliente->nombre ?? 'Sin nombre' }}</td>
                
                {{-- Nombre de la sucursal (usando la relación) --}}
                <td>{{ $res->sucursal->nombre ?? 'No especificada' }}</td>
                
                <td>{{ $res->fecha_hora }}</td>
                <td>{{ $res->numero_personas }}</td>
                <td>{{ $res->estatus }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No hay reservaciones registradas en el sistema.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>