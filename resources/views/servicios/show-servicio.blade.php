<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle de Servicio</title>
</head>
<body>
    <h1>Detalle de Servicio</h1>
    
    <p>
    <ul>
        <li><strong>Servicios:</strong></li>
        <ul>
            @foreach ($servicio->servicios as $s)
                <li>{{ $s }}</li>
            @endforeach
        </ul>

        <li><strong>Comentario:</strong> {{ $servicio->comentario }}</li>
    </ul>
    </p>
    
    <a href="{{ route('servicio.edit', $servicio) }}">Editar</a><br>
    <form action="{{ route('servicio.destroy', $servicio) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Borrar">
    </form>
</body>
</html>
