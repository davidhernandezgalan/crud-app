<x-layout titulo="Editar Servicio">
    <h1 class="mb-4">Editar Servicio</h1>

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('servicio.update', $servicio->id) }}" method="POST" class="form-horizontal">
        @csrf
        @method('PATCH')

        <div class="card">
            <div class="card-body">
                <!-- Servicios -->
                <fieldset class="form-group">
                    <legend>Servicios:</legend>
                    <div class="row">
                        <div class="col-sm-12">
                            <label><input type="checkbox" name="servicios[]" value="Barberia" {{ in_array('Barberia', $servicio->servicios) ? 'checked' : '' }}> Barbería</label><br>
                            <label><input type="checkbox" name="servicios[]" value="Tinte" {{ in_array('Tinte', $servicio->servicios) ? 'checked' : '' }}> Tinte</label><br>
                            <label><input type="checkbox" name="servicios[]" value="Maquillaje" {{ in_array('Maquillaje', $servicio->servicios) ? 'checked' : '' }}> Maquillaje</label><br>
                            <label><input type="checkbox" name="servicios[]" value="Peinado" {{ in_array('Peinado', $servicio->servicios) ? 'checked' : '' }}> Peinado</label><br>
                            <label><input type="checkbox" name="servicios[]" value="Corte Mujer" {{ in_array('Corte Mujer', $servicio->servicios) ? 'checked' : '' }}> Corte Mujer</label><br>
                            <label><input type="checkbox" name="servicios[]" value="Corte Hombre" {{ in_array('Corte Hombre', $servicio->servicios) ? 'checked' : '' }}> Corte Hombre</label><br>
                            <label><input type="checkbox" name="servicios[]" value="Depilación" {{ in_array('Depilación', $servicio->servicios) ? 'checked' : '' }}> Depilación</label>
                        </div>
                    </div>
                </fieldset>

                <!-- Comentario -->
                <div class="form-group row">
                    <label for="comentario" class="col-sm-3 col-form-label">Comentario:</label>
                    <div class="col-sm-9">
                        <textarea name="comentario" id="comentario" class="form-control" cols="30" rows="4">{{ old('comentario') ?? $servicio->comentario }}</textarea>
                    </div>
                </div>

                <!-- Botones -->
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <input type="submit" class="btn" value="Actualizar Servicio" style="background-color: #004aad; color: white;">
                        <a href="{{ url('/servicio') }}" class="btn" style="background-color: #ff3131; color: white;">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
