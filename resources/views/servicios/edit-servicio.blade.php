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

        <form action="{{ route('servicio.update', $servicio->id) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm">
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

                <!-- Carga de Archivo -->
                <div class="mb-3">
                    <label for="imagen" class="btn" style="background-color: #e4ac00; color: white; padding: 10px 20px; cursor: pointer;">
                        Seleccionar archivo
                    </label>
                    <input type="file" name="archivo" id="imagen" style="display: none;" onchange="previewImage(event)" />
                </div>

                <!-- Vista previa de la imagen -->
                @if($servicio->archivos && $servicio->archivos->isNotEmpty())
                    <div id="vista-previa" class="my-3" style="position: relative;">
                        <img id="imagen-previa" src="{{ asset('storage/' . $servicio->archivos->first()->ruta) }}" alt="Vista previa de la imagen" class="img-fluid rounded shadow-sm" width="100">
                        <button id="quitar-imagen" onclick="eliminarImagen(event)" style="position: absolute; top: 0; right: 0; background: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer;">×</button>
                    </div>
                @else
                    <div id="vista-previa" class="my-3" style="display: none; position: relative;">
                        <img id="imagen-previa" src="" alt="Vista previa de la imagen" class="img-fluid rounded shadow-sm" width="100">
                        <button id="quitar-imagen" onclick="eliminarImagen(event)" style="position: absolute; top: 0; right: 0; background: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer;">×</button>
                    </div>
                @endif
            </fieldset>

            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
                    <input type="submit" class="btn" value="Actualizar Servicio" style="background-color: #004aad; color: white;">
                    <a href="{{ url('/servicio') }}" class="btn" style="background-color: #ff3131; color: white;">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Función para previsualizar la imagen cargada
        function previewImage(event) {
            const file = event.target.files[0]; // Obtener el archivo seleccionado
            const reader = new FileReader();
            const preview = document.getElementById('vista-previa');
            const image = document.getElementById('imagen-previa');
            const btnQuitar = document.getElementById('quitar-imagen');

            reader.onload = function() {
                image.src = reader.result; // Asignar la URL del archivo a la imagen
                preview.style.display = 'block'; // Mostrar la vista previa
                btnQuitar.style.display = 'block'; // Mostrar el botón de eliminar
            }

            if (file) {
                reader.readAsDataURL(file); // Leer el archivo como URL
            }
        }

        // Función para eliminar la imagen de la vista previa sin enviar el formulario
        function eliminarImagen(event) {
            event.preventDefault(); // Prevenir que el evento de eliminar dispare el envío del formulario
            const preview = document.getElementById('vista-previa');
            const inputFile = document.getElementById('imagen');
            const btnQuitar = document.getElementById('quitar-imagen');

            // Limpiar el input de archivo (esto asegura que no se envié nada al servidor)
            inputFile.value = ''; // Borra el archivo cargado

            // Ocultar la vista previa y el botón de eliminar
            preview.style.display = 'none';
            btnQuitar.style.display = 'none';
        }
    </script>
</x-layout>