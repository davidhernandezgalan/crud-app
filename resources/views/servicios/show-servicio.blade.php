<x-layout titulo="Detalle de Servicio">
    <div class="container my-4">
        <h1 class="text-center mb-4">Detalle de Servicio</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Servicios:</h5>
                <ul class="services">
                    @foreach ($servicio->servicios as $s)
                        <li>{{ $s }}</li>
                    @endforeach
                </ul>
                <p class="card-text"><strong>Comentario:</strong> {{ $servicio->comentario }}</p>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <a class="btn" href="{{ route('servicio.edit', $servicio) }}" style="background-color: #e4ac00; color: white;">Editar</a>
                <form action="{{ route('servicio.destroy', $servicio) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn mx-2" style="background-color: #ff3131; color: white;">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
