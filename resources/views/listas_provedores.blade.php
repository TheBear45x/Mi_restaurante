<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas Provedores</title>
</head>
<body>
    <<div class="container">
    <h1>Lista de Proveedores</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Encargado</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($provedores as $p)
            <tr>
                <td>{{ $p->nombre }}</td>
                <td>{{ $p->encargado }}</td>
                <td>{{ $p->telefono }}</td>
                <td>{{ $p->correo }}</td>
                <td>{{ $p->estatus ? 'Activo' : 'Inactivo' }}</td>
                <td>
                    <a href="{{ route('provedores.editar', $p->id) }}" class="btn btn-warning">Editar</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>