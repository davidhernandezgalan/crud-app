<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicios</title>
</head>
<x-layout>
    <div class="container my-4">
        <h1 class="text-center mb-4">Servicios</h1>


        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($servicios as $servicio)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Servicio #{{ $servicio->id }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
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
                            </h6>
                            <p class="card-text">{{ $servicio->comentario }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="{{ route('servicio.show', $servicio) }}" class="btn me-2" style="background-color: #004aad; color: white;">Ver</a>
                            <a href="{{ route('servicio.edit', $servicio) }}" class="btn me-2" style="background-color: #e4ac00; color: white;">Editar</a>
                            <form action="{{ route('servicio.destroy', $servicio) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background-color: #ff3131; color: white;">Borrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
