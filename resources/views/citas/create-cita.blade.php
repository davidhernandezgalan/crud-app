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
                <div class="card-body">
                <!-- Nombre del cliente -->
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre del cliente:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
                        @error('nombre')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Campo de Fecha -->
                <div class="form-group row">
                    <label for="fecha" class="col-sm-3 col-form-label">Fecha:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="fecha" id="fecha" value="{{ old('fecha') }}">
                        @error('fecha')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Campo de Hora -->
                    <!-- Hora -->
                    <div class="form-group row">
                    <label for="hora" class="col-sm-3 col-form-label">Hora:</label>
                    <div class="col-sm-9">
                        <select name="hora" id="hora" class="form-control">
                            <option value="11:00" {{ old('hora') == '11:00' ? 'selected' : '' }}>11:00</option>
                            <option value="11:30" {{ old('hora') == '11:30' ? 'selected' : '' }}>11:30</option>
                            <option value="12:00" {{ old('hora') == '12:00' ? 'selected' : '' }}>12:00</option>
                            <option value="12:30" {{ old('hora') == '12:30' ? 'selected' : '' }}>12:30</option>
                            <option value="13:00" {{ old('hora') == '13:00' ? 'selected' : '' }}>13:00</option>
                            <option value="13:30" {{ old('hora') == '13:30' ? 'selected' : '' }}>13:30</option>
                            <option value="14:00" {{ old('hora') == '14:00' ? 'selected' : '' }}>14:00</option>
                            <option value="14:30" {{ old('hora') == '14:30' ? 'selected' : '' }}>14:30</option>
                            <option value="15:00" {{ old('hora') == '15:00' ? 'selected' : '' }}>15:00</option>
                            <option value="15:30" {{ old('hora') == '15:30' ? 'selected' : '' }}>15:30</option>
                            <option value="16:00" {{ old('hora') == '16:00' ? 'selected' : '' }}>16:00</option>
                            <option value="16:30" {{ old('hora') == '16:30' ? 'selected' : '' }}>16:30</option>
                            <option value="17:00" {{ old('hora') == '17:00' ? 'selected' : '' }}>17:00</option>
                            <option value="17:30" {{ old('hora') == '17:30' ? 'selected' : '' }}>17:30</option>
                            <option value="18:00" {{ old('hora') == '18:00' ? 'selected' : '' }}>18:00</option>
                            <option value="18:30" {{ old('hora') == '18:30' ? 'selected' : '' }}>18:30</option>
                            <option value="19:00" {{ old('hora') == '19:00' ? 'selected' : '' }}>19:00</option>
                            <option value="19:30" {{ old('hora') == '19:30' ? 'selected' : '' }}>19:30</option>
                            <option value="20:00" {{ old('hora') == '20:00' ? 'selected' : '' }}>20:00</option>
                        </select>
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
