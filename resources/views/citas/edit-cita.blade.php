<x-layout titulo="Editar cita">
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
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre del cliente:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') ?? $cita->nombre }}">
                        @error('nombre')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Fecha -->
                <div class="form-group row">
                    <label for="fecha" class="col-sm-3 col-form-label">Fecha:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="fecha" id="fecha" value="{{ old('fecha') ?? $cita->fecha }}">
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
                            <option value="11:00" @selected($cita->hora == '11:00:00')>11:00</option>
                            <option value="11:30" @selected($cita->hora == '11:30:00')>11:30</option>
                            <option value="12:00" @selected($cita->hora == '12:00:00')>12:00</option>
                            <option value="12:30" @selected($cita->hora == '12:30:00')>12:30</option>
                            <option value="13:00" @selected($cita->hora == '13:00:00')>13:00</option>
                            <option value="13:30" @selected($cita->hora == '13:30:00')>13:30</option>
                            <option value="14:00" @selected($cita->hora == '14:00:00')>14:00</option>
                            <option value="14:30" @selected($cita->hora == '14:30:00')>14:30</option>
                            <option value="15:00" @selected($cita->hora == '15:00:00')>15:00</option>
                            <option value="15:30" @selected($cita->hora == '15:30:00')>15:30</option>
                            <option value="16:00" @selected($cita->hora == '16:00:00')>16:00</option>
                            <option value="16:30" @selected($cita->hora == '16:30:00')>16:30</option>
                            <option value="17:00" @selected($cita->hora == '17:00:00')>17:00</option>
                            <option value="17:30" @selected($cita->hora == '17:30:00')>17:30</option>
                            <option value="18:00" @selected($cita->hora == '18:00:00')>18:00</option>
                            <option value="18:30" @selected($cita->hora == '18:30:00')>18:30</option>
                            <option value="19:00" @selected($cita->hora == '19:00:00')>19:00</option>
                            <option value="19:30" @selected($cita->hora == '19:30:00')>19:30</option>
                            <option value="20:00" @selected($cita->hora == '20:00:00')>20:00</option>
                        </select>
                    </div>
                </div>

                <!-- Servicio -->
                <div class="form-group row">
                    <label for="servicio" class="col-sm-3 col-form-label">Servicio:</label>
                    <div class="col-sm-9">
                        <select name="servicio" id="servicio" class="form-control">
                            <option value="Barberia" @selected($cita->servicio == 'Barberia')>Barbería</option>
                            <option value="Tinte" @selected($cita->servicio == 'Tinte')>Tinte</option>
                            <option value="Maquillaje_Peinado" @selected($cita->servicio == 'Maquillaje_Peinado')>Maquillaje/Peinado</option>
                            <option value="Corte" @selected($cita->servicio == 'Corte')>Corte Mujer/Hombre</option>
                        </select>
                    </div>
                </div>

                <!-- Comentario -->
                <div class="form-group row">
                    <label for="comentario" class="col-sm-3 col-form-label">Comentario:</label>
                    <div class="col-sm-9">
                        <textarea name="comentario" id="comentario" class="form-control" cols="30" rows="4">{{ old('comentario') ?? $cita->comentario }}</textarea>
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
  