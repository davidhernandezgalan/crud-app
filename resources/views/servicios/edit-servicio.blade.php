<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Servicio</title>
</head>
<body>
    <h1>Editar Servicio</h1>

    <form action="{{ route('servicio.update', $servicio->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <fieldset>
            <legend>Servicios:</legend>
            <label><input type="checkbox" name="servicios[]" value="Barberia"> Barberia</label><br>
            <label><input type="checkbox" name="servicios[]" value="Tinte"> Tinte</label><br>
            <label><input type="checkbox" name="servicios[]" value="Maquillaje"> Maquillaje</label><br>
            <label><input type="checkbox" name="servicios[]" value="Peinado"> Peinado</label><br>
            <label><input type="checkbox" name="servicios[]" value="Corte Mujer"> Corte Mujer</label><br>
            <label><input type="checkbox" name="servicios[]" value="Corte Hombre"> Corte Hombre</label><br>
            <label><input type="checkbox" name="servicios[]" value="Depilación"> Depilación</label><br>
        </fieldset>

        <label for="comentario">Comentario:</label><br>
        <textarea name="comentario" cols="30" rows="4">{{ old('comentario') ?? $servicio->comentario }}</textarea><br>
 

        <input type="submit" value="Actualizar Servicio">

    </form>
</body>
</html>

