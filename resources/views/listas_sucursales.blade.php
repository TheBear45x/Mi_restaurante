<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Sucursales</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Número de Sucursal</th>
                <th>Calle</th>
                <th>Teléfono</th>
                <th>Gerente</th>
                <th>Código Postal</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sucursales as $sucursal)
            <tr>
                <td>{{ $sucursal->nombre }}</td>
                <td>{{ $sucursal->numero_sucursal }}</td>
                <td>{{ $sucursal->calle }}</td>
                <td>{{ $sucursal->telefono }}</td>
                <td>{{ $sucursal->gerente }}</td>
                <td>{{ $sucursal->codigo_postal }}</td>
                <td>{{ $sucursal->estatus }}</td>
                <td></td>
                <td><a href="{{route('sucursales.eliminar', $sucursal->id) }}">Eliminar</a></td>
                <td><a href="{{route('sucursales.editar', $sucursal->id) }}">Editar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>