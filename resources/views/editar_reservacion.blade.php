<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Reservación</title>
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --bg-color: #f3f4f6;
            --card-bg: #ffffff;
            --text-color: #1f2937;
            --border-color: #d1d5db;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: var(--card-bg);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        h2 {
            margin-top: 0;
            text-align: center;
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        label {
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: -0.5rem;
        }

        select, input {
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }

        select:focus, input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        button {
            background-color: var(--primary-color);
            color: white;
            padding: 0.8rem;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-top: 1rem;
        }

        button:hover {
            background-color: var(--primary-hover);
        }

        /* Estilo para los selectores */
        select {
            background-color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Actualizar Reservación</h2>
    
    <form action="{{ route('reservaciones.actualizar', $reservacion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="user_id">Cliente</label>
        <select name="user_id" id="user_id" required>
            <option value="">Seleccionar Cliente</option>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ $reservacion->user_id == $usuario->id ? 'selected' : '' }}>
                    {{ $usuario->name }} ({{ $usuario->email }})
                </option>
            @endforeach
        </select>

        <label for="sucursal_id">Sucursal</label>
        <select name="sucursal_id" id="sucursal_id" required>
            <option value="">Seleccionar Sucursal</option>
            @foreach($sucursales as $sucursal)
                <option value="{{ $sucursal->id }}" {{ $reservacion->sucursal_id == $sucursal->id ? 'selected' : '' }}>
                    {{ $sucursal->nombre }}
                </option>
            @endforeach
        </select>

        <label for="fecha_hora">Fecha y Hora</label>
        <input type="datetime-local" name="fecha_hora" id="fecha_hora" value="{{ date('Y-m-d\TH:i', strtotime($reservacion->fecha_hora)) }}" required>

        <label for="numero_personas">Número de Personas</label>
        <input type="number" name="numero_personas" id="numero_personas" min="1" value="{{ $reservacion->numero_personas }}" required>

        <label for="estatus">Estatus de la Reserva</label>
        <select name="estatus" id="estatus" required>
            <option value="pendiente" {{ $reservacion->estatus == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="confirmada" {{ $reservacion->estatus == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
            <option value="cancelada" {{ $reservacion->estatus == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
        </select>

        <button type="submit">Guardar Cambios</button>
    </form>
</div>

</body>
</html>