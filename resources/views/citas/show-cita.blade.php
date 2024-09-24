<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle de Cita</title>
</head>
<body>
    <h1>Detalle de Cita</h1>
    
    <h2>Cliente: {{ $cita->nombre }}</h2>
    <p>
        <ul>
            <li>Fecha: {{ $cita->fecha }}</li>
            <li>Hora: {{ $cita->hora }}</li>
            <li>Servicio: {{ $cita->servicio }}</li>
            <li>Comentario: {{ $cita->comentario }}</li>
        </ul>
    </p>
    
    <a href="{{ route('cita.edit', $cita) }}">Editar</a><br>

    <form action="{{ route('cita.destroy', $cita) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Borrar">
    </form>
</body>
</html>