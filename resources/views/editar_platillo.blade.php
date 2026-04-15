<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar platillos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body>
<section class="tarjeta-registro" style="max-width: 600px;">
<form action="{{route('platillo.actualizar')}}" method="post">
    @csrf
     <input type="hidden" name="id" value="{{$platillos->id}}">
    <div class="grupo-campo">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" placeholder="Ej. Bateria" required>
                </div>
                <div class="grupo-campo">
                    <label>Descripcion:</label>
                    <textarea name="descripcion"></textarea>
                </div>
                <div class="grupo-campo">
                    <label>Precio:</label>
                    <input type="number" name="precio" step="0000.01" placeholder="Ej. 100.00" required>
                </div>
                <div class="grupo-campo">
                    <label>Foto:</label>
                <input type="file" name="foto">
                </div>
                <div class="form-footer-btns">
                    <button type="button" class="btn-h del" onclick="history.back()">CANCELAR</button>
                    <button type="submit">GUARDAR CAMBIOS</button>
                </div>
</form>
</section>
</body>