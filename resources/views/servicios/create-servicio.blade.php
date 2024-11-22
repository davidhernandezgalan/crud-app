<x-layout titulo="Crear Servicio">
    <div class="container my-4">
        <h1 class="text-center mb-4">Crear Servicio</h1>

        <form action="{{ route('servicio.store') }}" method="POST" enctype='multipart/form-data' class="p-4 border rounded shadow-sm">
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

<!-- Carga de Archivo -->
<label for="imagen" class="btn" style="background-color: #e4ac00; color: white; padding: 10px 20px; cursor: pointer;">
    Seleccionar archivo
</label>
<input type="file" name="archivo" id="imagen" style="display: none;" onchange="previewImage(event)" />

<!-- Vista previa de la imagen -->
<div id="vista-previa" class="my-3" style="display: none; position: relative;">
    <img id="imagen-previa" src="" alt="Vista previa de la imagen" class="img-fluid rounded shadow-sm" width="100">
    <button id="quitar-imagen" onclick="eliminarImagen(event)" style="position: absolute; top: 0; right: 0; background: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer;">×</button>
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

    // Prevenir el envío del formulario si no hay archivo
    document.querySelector('form').addEventListener('submit', function(event) {
        const inputFile = document.getElementById('imagen');

        // Si no hay archivo seleccionado, no enviamos el formulario
        // Si no se ha subido una imagen, no bloqueamos el envío del formulario
        // Por tanto, no es obligatorio el archivo para poder agregar el servicio
    });
</script>



            </fieldset>

            <div class="text-center">
                <button type="submit" class="btn" style="background-color: #004aad; color: white;">Agregar Servicio</button>
            </div>

        </form>
    </div>
</x-layout>
