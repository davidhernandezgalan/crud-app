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

    <style>
        .error {
            color: red;
            font-size: 14px;
        }
    </style>

    <form action="{{ route('cita.update', $cita) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="nombre">Nombre del cliente:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') ?? $cita->nombre }}"><br>
        @error('nombre')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="fecha">Fecha:</label><br>
        <input type="date" name="fecha" id="fecha" value="{{ old('fecha') ?? $cita->fecha }}"><br>

        @error('fecha')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="hora">Hora:</label><br>
        <select name="hora" id="hora">
            <option value="11:00" @selected($cita->hora == '11:00:00')>11:00</option>
            <option value="11:30" @selected($cita->hora == '11:30:00')>11:30</option>
            <option value="12:00" @selected($cita->hora == '12:00:00')>12:00</option>
            <option value="12:30" @selected($cita->hora == '12:30:00')>12:30</option>
            <option value="13:00" @selected($cita->hora == '13:00:00')>13:00</option>
            <option value="13:30" @selected($cita->hora == '13:30:00')>13:30</option>
            <option value="14:00" @selected($cita->hora == '14:00:00')>14:00</option>
            <option value="14:30" @selected($cita->hora == '14:30:00')>14:30</option>
            <option value="15:00" @selected($cita->hora == '15:00:00')>15:00</option>
            <option value="15:30" @selected($cita->hora == '15:30:00')>15:30</option>
            <option value="16:00" @selected($cita->hora == '16:00:00')>16:00</option>
            <option value="16:30" @selected($cita->hora == '16:30:00')>16:30</option>
            <option value="17:00" @selected($cita->hora == '17:00:00')>17:00</option>
            <option value="17:30" @selected($cita->hora == '17:30:00')>17:30</option>
            <option value="18:00" @selected($cita->hora == '18:00:00')>18:00</option>
            <option value="18:30" @selected($cita->hora == '18:30:00')>18:30</option>
            <option value="19:00" @selected($cita->hora == '19:00:00')>19:00</option>
            <option value="19:30" @selected($cita->hora == '19:30:00')>19:30</option>
            <option value="20:00" @selected($cita->hora == '20:00:00')>20:00</option>
         </select><br>

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
        <a href="{{ url('/cita') }}">
            <button type="button">Cancelar</button>
        </a>
    </form>
</body>
</html>
