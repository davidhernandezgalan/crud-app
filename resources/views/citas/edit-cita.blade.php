<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Cita</title>
</head>
<body>
    <h1>Editar Cita</h1>

    <form action="{{ route('cita.update', $cita) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="nombre">Nombre del cliente:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') ?? $cita->nombre }}"><br>

        <label for="fecha">Fecha:</label><br>
        <input type="date" name="fecha" id="fecha" value="{{ old('fecha') ?? $cita->fecha }}"><br>

        <label for="hora">Hora:</label><br>
        <input type="time" name="hora" id="hora" value="{{ old('hora') ?? $cita->hora }}"><br>

        <label for="servicio">Servicio:</label>
        <select name="servicio" id="servicio">
            <option value="Barberia" @selected($cita->servicio == 'Barberia')>Barberia</option>
            <option value="Tinte" @selected($cita->servicio == 'Tinte')>Tinte</option>
            <option value="Maquillaje_Peinado" @selected($cita->servicio == 'Maquillaje_Peinado')>Maquillaje/Peinado</option>
            <option value="Corte" @selected($cita->servicio == 'Corte')>Corte Mujer/Hombre</option>
        </select><br>

        <label for="comentario">Comentario:</label><br>
        <textarea name="comentario" cols="30" rows="4">{{ old('comentario') ?? $cita->comentario }}</textarea><br>

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
