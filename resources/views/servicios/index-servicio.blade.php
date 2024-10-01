<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Servicios</title>
</head>
<body>
    <h1>Lista de Servicios</h1>

    <p>
        <a href="{{ route('servicio.create') }}">Agregar Servicio</a>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Servicio</th>
                <th>Comentario</th>
                <th>Creación</th>
                <th>Última Edición</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicios as $servicio)
            <tr>
                <td>{{ $servicio->id }}</td>
                <td>
                    @php
                        // Convertir el JSON a array
                        $serviciosArray = json_decode($servicio->servicios, true);
                    @endphp

                    @if(is_array($serviciosArray))
                        @foreach ($serviciosArray as $s)
                            {{ $s }}@if(!$loop->last), @endif
                        @endforeach
                    @else
                        {{ $servicio->servicios }} <!-- En caso de que no sea un array -->
                    @endif
                </td>

                <td>{{ $servicio->comentario }}</td>
                <td>{{ $servicio->created_at }}</td>
                <td>{{ $servicio->updated_at }}</td>
                <td>
                    <a href="{{ route('servicio.edit', $servicio) }}">Editar</a>
                    <a href="{{ route('servicio.destroy', $servicio) }}" method="POST">Borrar </a> 
                
                    @csrf
                    @method('DELETE')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
