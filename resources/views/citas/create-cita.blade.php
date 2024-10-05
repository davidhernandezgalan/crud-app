<x-layout titulo="Crear cita">
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

                <!-- Fecha -->
                <div class="form-group row">
                    <label for="fecha" class="col-sm-3 col-form-label">Fecha:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="fecha" id="fecha" value="{{ old('fecha') }}">
                        @error('fecha')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

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

                <!-- Servicio -->
                <div class="form-group row">
                    <label for="servicio" class="col-sm-3 col-form-label">Servicio:</label>
                    <div class="col-sm-9">
                        <select name="servicio" id="servicio" class="form-control">
                            <option value="Barberia" {{ old('servicio') == 'Barberia' ? 'selected' : '' }}>Barbería</option>
                            <option value="Tinte" {{ old('servicio') == 'Tinte' ? 'selected' : '' }}>Tinte</option>
                            <option value="Maquillaje_Peinado" {{ old('servicio') == 'Maquillaje_Peinado' ? 'selected' : '' }}>Maquillaje/Peinado</option>
                            <option value="Corte" {{ old('servicio') == 'Corte' ? 'selected' : '' }}>Corte Mujer/Hombre</option>
                        </select>
                    </div>
                </div>

                <!-- Comentario -->
                <div class="form-group row">
                    <label for="comentario" class="col-sm-3 col-form-label">Comentario:</label>
                    <div class="col-sm-9">
                        <textarea name="comentario" id="comentario" class="form-control" cols="30" rows="4">{{ old('comentario') }}</textarea>
                    </div>
                </div>

                <!-- Botones -->
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <input type="submit" class="btn" value="Agendar" style="background-color: #004aad; color: white;">
                        <a href="{{ url('/cita') }}" class="btn" style="background-color: #ff3131; color: white;">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>