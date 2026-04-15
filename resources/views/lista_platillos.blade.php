<table> 
    <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>
    @foreach ($platillos as $fila)
    <tr>
        <td>{{$fila->nombre}}</td>
        <td>{{$fila->descripcion}}</td>
        <td>{{$fila->precio}}</td>
        <td><img src="{{asset('storage/'.$fila->foto)}}" width="150"></td>
        {{-- <td>{{$fila->platillo->nombre}}</td> --}}
        <td><a href="{{route('platillo.nuevo', $fila->id)}}">Agregar</a></td>
        <td><a href="{{route('platillo.editar', $fila->id)}}">Editar</a></td>
        <td><a href="{{route('platillo.eliminar', $fila->id)}}">Eliminar</a></td>

    </tr>
        
    @endforeach
</table>