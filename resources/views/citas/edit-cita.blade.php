<x-layout titulo="Editar Cita">
    <h1 class="mb-4">Editar Cita</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cita.update', $cita) }}" method="POST" class="form-horizontal">
        @csrf
        @method('PATCH')
        <div class="card">
            <div class="card-body">
                <!-- Nombre del cliente -->
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre', $cita->nombre) }}">
                        @error('nombre')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Fecha -->
                <div class="form-group row">
                    <label for="fecha" class="col-sm-3 col-form-label">Fecha:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="fecha" id="fecha" value="{{ old('fecha', $cita->fecha) }}">
                        @error('fecha')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Hora -->
                <div class="form-group row">
                    <label for="hora" class="col-sm-3 col-form-label">Hora:</label>
                    <div class="col-sm-9">
                        <select name="hora" id="hora" class="form-control">
                            @foreach (['11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00'] as $time)
                                <option value="{{ $time }}" @selected($cita->hora == $time)>{{ $time }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Selección de Servicios -->
                <div class="form-group row">
                    <label for="servicios" class="col-sm-3 col-form-label">Servicios:</label>
                    <div class="col-sm-9">
                        @foreach($servicios as $servicio)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="servicios[]" value="{{ $servicio->id }}" id="servicio_{{ $servicio->id }}" 
                                {{ in_array($servicio->id, old('servicios', $cita->servicios->pluck('id')->toArray())) ? 'checked' : '' }}>
                                <label class="form-check-label" for="servicio_{{ $servicio->id }}">{{ $servicio->servicio }}</label>
                            </div>
                        @endforeach
                        @error('servicios')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Comentario -->
                <div class="form-group row">
                    <label for="comentario" class="col-sm-3 col-form-label">Comentario:</label>
                    <div class="col-sm-9">
                        <textarea name="comentario" id="comentario" class="form-control" rows="4">{{ old('comentario', $cita->comentario) }}</textarea>
                    </div>
                </div>

                <!-- Botones -->
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <input type="submit" class="btn" value="Actualizar" style="background-color: #004aad; color: white;">
                        <a href="{{ url('/cita') }}" class="btn" style="background-color: #ff3131; color: white;">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
