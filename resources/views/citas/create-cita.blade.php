<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Cita</title>
</head>
<body>
    <h1>Crear Cita</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cita.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre del cliente:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') }}"><br>

        <label for="fecha">Fecha:</label><br>
        <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}"><br>

        <label for="hora">Hora:</label><br>
        <input type="time" name="hora" id="hora" value="{{ old('hora') }}"><br>

        <label for="servicio">Servicio:</label>
        <select name="servicio" id="servicio">
            <option value="Barberia">Barberia</option>
            <option value="Tinte">Tinte</option>
            <option value="Maquillaje_Peinado">Maquillaje/Peinado</option>
            <option value="Corte">Corte Mujer/Hombre</option>
        </select><br>

        <label for="comentario">Comentario:</label><br>
        <textarea name="comentario" cols="30" rows="4">{{ old('comentario') }}</textarea><br>

        <input type="submit" value="Agendar">
    </form>
</body>
</html>
