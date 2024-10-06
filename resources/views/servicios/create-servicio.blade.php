<x-layout>
    <div class="container my-4">
        <h1 class="text-center mb-4">Crear Servicio</h1>

        <form action="{{ route('servicio.store') }}" method="POST" class="p-4 border rounded shadow-sm">
            @csrf

            <fieldset class="mb-3">
                <legend class="mb-3">Servicios:</legend>

                <!-- Mostrar errores específicos para el campo "servicios" -->
                @if ($errors->has('servicios'))
                    <div class="alert alert-danger">
                        {{ $errors->first('servicios') }}
                    </div>
                @endif

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="servicios[]" value="Barberia" id="barberia">
                    <label class="form-check-label" for="barberia">Barberia</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="servicios[]" value="Tinte" id="tinte">
                    <label class="form-check-label" for="tinte">Tinte</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="servicios[]" value="Maquillaje" id="maquillaje">
                    <label class="form-check-label" for="maquillaje">Maquillaje</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="servicios[]" value="Peinado" id="peinado">
                    <label class="form-check-label" for="peinado">Peinado</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="servicios[]" value="Corte Mujer" id="corteMujer">
                    <label class="form-check-label" for="corteMujer">Corte Mujer</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="servicios[]" value="Corte Hombre" id="corteHombre">
                    <label class="form-check-label" for="corteHombre">Corte Hombre</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="servicios[]" value="Depilación" id="depilacion">
                    <label class="form-check-label" for="depilacion">Depilación</label>
                </div>
            </fieldset>

            <div class="mb-3">
                <label for="comentario" class="form-label">Comentario:</label>
                <textarea name="comentario" id="comentario" class="form-control" rows="4">{{ old('comentario') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Servicios</button>
        </form>
    </div>
</x-layout>
