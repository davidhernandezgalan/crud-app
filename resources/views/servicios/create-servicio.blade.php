<x-layout titulo="Crear Servicio">
    <div class="container my-4">
        <h1 class="text-center mb-4">Crear Servicio</h1>

        <form action="{{ route('servicio.store') }}" method="POST" class="p-4 border rounded shadow-sm">
            @csrf

            <fieldset class="mb-3">
                <legend class="mb-3">Servicio:</legend>

                <!-- Mostrar errores específicos para el campo "servicio" -->
                @error('servicio')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <!-- Campo de texto para el servicio -->
                <div class="mb-3">
                    <label for="servicio" class="form-label">Nombre del Servicio:</label>
                    <input type="text" class="form-control @error('servicio') is-invalid @enderror" 
                           name="servicio" id="servicio" value="{{ old('servicio') }}" required>
                    <!-- Si hay un error, se mostrará una alerta debajo del campo -->
                    @error('servicio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </fieldset>

            <button type="submit" class="btn" style="background-color: #004aad; color: white;">Agregar Servicio</button>
        </form>
    </div>
</x-layout>
