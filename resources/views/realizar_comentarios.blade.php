<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizando tu comentario</title>
</head>
<body>
    <div>
        <h3>Realiza tu comentario sin miedo</h3>
        <h3>Nos interesa tu opinión para mejorar tu experiencia</h3>
    </div>
    <form action="{{ route('comentarios.agregar') }}" method="POST">
    @csrf0

    <div class="user-info">
        <img src="{{ Auth::user()->avatar }}" alt="Perfil" style="width: 50px; border-radius: 50%;">
        <span>{{ Auth::user()->name }}</span>
    </div>

    <div class="product-info">
        <img src="{{ asset('img/' . $platillo->imagen) }}" alt="{{ $platillo->nombre }}" width="100">
        <h4>{{ $platillo->nombre }}</h4>
        <input type="hidden" name="producto_id" value="{{ $platillo->id }}">
    </div>

    <div class="form-group">
        <label>Escribe tu opinión:</label>
        <textarea name="comentario" rows="4" class="form-control" placeholder="¿Qué te pareció el platillo?" required></textarea>
    </div>

    <div class="rating">
        <label>Calificación:</label>
        <div class="stars">
            @for ($i = 5; $i >= 1; $i--)
                <input type="radio" id="star{{ $i }}" name="calificacion" value="{{ $i }}" required>
                <label for="star{{ $i }}">★</label>
            @endfor
        </div>
    </div>

    <button type="submit" class="btn-submit">Publicar Comentario</button>
</form>
</body>
</html>