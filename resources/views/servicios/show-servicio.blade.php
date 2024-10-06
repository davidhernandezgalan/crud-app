<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle de Servicio</title>
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
        .card ul {
            list-style-type: none; /* Para eliminar la viñeta por defecto */
            padding: 0;
        }
        .card ul li {
            margin: 10px 0;
        }
        .card ul.services {
            list-style-type: disc; /* Establece viñetas para la lista de servicios */
            margin-left: 20px; /* Aumenta el margen izquierdo para las viñetas */
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Detalle de Servicio</h1>
        <ul>
            <li><strong>Servicios:</strong>
                <ul class="services">
                    @foreach ($servicio->servicios as $s)
                        <li>{{ $s }}</li>
                    @endforeach
                </ul>
            </li>
            <li><strong>Comentario:</strong> {{ $servicio->comentario }}</li>
        </ul>
        <a class="btn" href="{{ route('servicio.edit', $servicio) }}">Editar</a>
        <form action="{{ route('servicio.destroy', $servicio) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Borrar">
        </form>
    </div>
</body>
</html>
