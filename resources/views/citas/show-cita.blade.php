<x-layout titulo="Detalle de cita">
    <div class="container my-4">
    <h1 class="text-center mb-4">Detalle de Cita</h1>

    <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $cita->nombre }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $cita->fecha }} - 
                    @php
                        $time = \Carbon\Carbon::parse($cita->hora);
                        $formattedTime = $time->format('g:i A');
                    @endphp
                    {{ $formattedTime }}
                </h6>
                <p class="card-text"><strong>Servicio:</strong> {{ $cita->servicio }}</p>
                <p class="card-text"><strong>Comentario:</strong> {{ $cita->comentario }}</p>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <a href="{{ route('cita.edit', $cita) }}" class="btn" style="background-color: #e4ac00; color: white;">Editar</a>
                <form action="{{ route('cita.destroy', $cita) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn mx-2" style="background-color: #ff3131; color: white;">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>