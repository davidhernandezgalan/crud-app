<x-layout titulo="Crear Cita">
    <h1 class="mb-4">Crear Cita</h1>
    
    <!-- Salida de errores -->
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('cita.store') }}" method="POST" class="form-horizontal">
        @csrf
        <div class="card">
            <div class="card-body">
                <!-- Campo de Nombre del Cliente -->
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                    <div class="col-sm-9">
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                    </div>
                </div>

                <!-- Campo de Fecha -->
                <div class="form-group row">
                    <label for="fecha" class="col-sm-3 col-form-label">Fecha:</label>
                    <div class="col-sm-9">
                        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') }}" required>
                    </div>
                </div>

                <!-- Campo de Hora -->
                <div class="form-group row">
                    <label for="hora" class="col-sm-3 col-form-label">Hora:</label>
                    <div class="col-sm-9">
                        <input type="time" name="hora" id="hora" class="form-control" value="11:00" required>
                    </div>
                </div>

                <!-- Selección de Servicios Dinámicos -->
                <div class="form-group row">
                    <label for="servicios" class="col-sm-3 col-form-label">Servicios:</label>
                    <div class="col-sm-9">
                        @if($servicios->isEmpty())
                            <div class="alert alert-danger" role="alert">
                                No hay Servicios Disponibles por el Momento.
                            </div>
                        @else
                            @foreach($servicios as $servicio)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="servicios[]" value="{{ $servicio->id }}" id="servicio_{{ $servicio->id }}" 
                                    {{ in_array($servicio->id, old('servicios', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="servicio_{{ $servicio->id }}">{{ $servicio->servicio }}</label>
                                </div>
                            @endforeach
                        @endif
                        @error('servicios')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Campo de Comentario (opcional) -->
                <div class="form-group row">
                    <label for="comentario" class="col-sm-3 col-form-label">Comentario:</label>
                    <div class="col-sm-9">
                        <textarea name="comentario" id="comentario" class="form-control" rows="3">{{ old('comentario') }}</textarea>
                    </div>
                </div>

                <!-- Botón de envío -->
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn" style="background-color: #004aad; color: white;">Crear Cita</button>
                        <a href="{{ url('/cita') }}" class="btn" style="background-color: #ff3131; color: white;">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
