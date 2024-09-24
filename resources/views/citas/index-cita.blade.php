<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Citas</title>
</head>
<body>
    <h1>Lista de Citas</h1>

    <p>
        <a href="{{ route('cita.create') }}">Agregar Cita</a>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Cliente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Servicio</th>
                <th>Comentario</th>
                <th>Creación</th>
                <th>Última Edición</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citas as $cita)
            <tr>
                <td>{{ $cita->id }}</td>
                <td>
                    <a href="{{ route('cita.show', $cita) }}">
                        {{ $cita->nombre }}
                    </a>
                </td>
                <td>{{ $cita->fecha }}</td>
                <td>{{ $cita->hora }}</td>
                <td>{{ $cita->servicio }}</td>
                <td>{{ $cita->comentario }}</td>
                <td>{{ $cita->created_at }}</td>
                <td>{{ $cita->updated_at }}</td>
                <td>
                    <a href="{{ route('cita.edit', $cita) }}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
