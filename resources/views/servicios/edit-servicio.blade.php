<x-layout titulo="Editar Servicio">
    <div class="container my-4">
        <h1 class="text-center mb-4">Editar Servicio</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('servicio.update', $servicio->id) }}" method="POST" class="p-4 border rounded shadow-sm">
            @csrf
            @method('PATCH')

            <fieldset class="mb-3">
                <legend class="mb-3">Servicio:</legend>

                <!-- Mostrar errores específicos para el campo "servicio" -->
                @if ($errors->has('servicio'))
                    <div class="alert alert-danger">
                        {{ $errors->first('servicio') }}
                    </div>
                @endif

                <!-- Campo de texto para el servicio -->
                <div class="mb-3">
                    <label for="servicio" class="form-label">Nombre del Servicio:</label>
                    <input type="text" class="form-control" name="servicio" id="servicio" value="{{ old('servicio', $servicio->servicio) }}" required>
                </div>
            </fieldset>

            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
                    <input type="submit" class="btn" value="Actualizar Servicio" style="background-color: #004aad; color: white;">
                    <a href="{{ url('/servicio') }}" class="btn" style="background-color: #ff3131; color: white;">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</x-layout>
