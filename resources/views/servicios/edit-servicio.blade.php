<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Servicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 20px auto;
            max-width: 400px;
            padding: 20px;
        }
        .card h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        fieldset {
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 10px;
        }
        legend {
            font-weight: bold;
            color: #007bff;
        }
        label {
            display: block;
            margin: 10px 0;
        }
        textarea {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 8px;
            resize: vertical; /* Permite cambiar el tamaño verticalmente */
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
            width: 100%;
        }
        input[type="submit"]:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Editar Servicio</h1>
        <form action="{{ route('servicio.update', $servicio->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <fieldset>
                <legend>Servicios:</legend>
                <label><input type="checkbox" name="servicios[]" value="Barberia" {{ in_array('Barberia', $servicio->servicios) ? 'checked' : '' }}> Barberia</label>
                <label><input type="checkbox" name="servicios[]" value="Tinte" {{ in_array('Tinte', $servicio->servicios) ? 'checked' : '' }}> Tinte</label>
                <label><input type="checkbox" name="servicios[]" value="Maquillaje" {{ in_array('Maquillaje', $servicio->servicios) ? 'checked' : '' }}> Maquillaje</label>
                <label><input type="checkbox" name="servicios[]" value="Peinado" {{ in_array('Peinado', $servicio->servicios) ? 'checked' : '' }}> Peinado</label>
                <label><input type="checkbox" name="servicios[]" value="Corte Mujer" {{ in_array('Corte Mujer', $servicio->servicios) ? 'checked' : '' }}> Corte Mujer</label>
                <label><input type="checkbox" name="servicios[]" value="Corte Hombre" {{ in_array('Corte Hombre', $servicio->servicios) ? 'checked' : '' }}> Corte Hombre</label>
                <label><input type="checkbox" name="servicios[]" value="Depilación" {{ in_array('Depilación', $servicio->servicios) ? 'checked' : '' }}> Depilación</label>
            </fieldset>

            <label for="comentario">Comentario:</label>
            <textarea name="comentario" cols="30" rows="4">{{ old('comentario') ?? $servicio->comentario }}</textarea>

            <input type="submit" value="Actualizar Servicio">
        </form>
    </div>
</body>
</html>
