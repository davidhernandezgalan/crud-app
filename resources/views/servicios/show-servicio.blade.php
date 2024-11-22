<x-layout titulo="Detalle de Servicio">
    <div class="container my-4">
        <h1 class="text-center mb-4">Detalle de Servicio</h1>

        <div class="card">
        <div class="card-body">
    <!-- Mostrar el ID y el nombre del servicio, centrado -->
    <h5 class="card-title text-center">Servicio: <small>{{ $servicio->servicio }}</small></h5>

    <!-- Mostrar Imágenes Asociadas al Servicio, centradas -->
    @foreach ($servicio->archivos as $archivo)
        @if (in_array(pathinfo($archivo->nombre_original, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
            <div class="text-center my-3">
                    <img src="{{ asset('/storage/'.$archivo->ruta) }}" alt="{{ $archivo->nombre_original }}" width="200" class="img-fluid rounded shadow-sm">
            </div>
        @endif
    @endforeach
</div>

<!-- Lista de archivos con botones de descarga centrados -->
<ul class="list-unstyled text-center">
    @foreach ($servicio->archivos as $archivo)
        <li class="my-2">
            <form action="{{ route('descargar', $archivo) }}" method="GET" class="d-inline" id="downloadForm{{ $archivo->id }}">
                @csrf
                <button type="submit" class="btn" style="background-color: #004aad; color: white;">
                    Descargar Imagen
                </button>
            </form>
        </li>
    @endforeach
</ul>
            <div class="card-footer d-flex justify-content-center">
                <!-- Enlace de edición del servicio -->
                <a class="btn" href="{{ route('servicio.edit', $servicio->id) }}" style="background-color: #e4ac00; color: white;">Editar</a>
                
                <!-- Formulario para borrar el servicio -->
                <form action="{{ route('servicio.destroy', $servicio->id) }}" method="POST" class="d-inline" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn mx-2" style="background-color: #ff3131; color: white;" onclick="openModal('{{ $servicio->id }}')">Borrar</button>
                </form>
            </div>
        </div>

    <!-- Modal de Confirmación -->
    <div class="modal" tabindex="-1" id="confirmModal" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #004aad; color: white;">
                    <h5 class="modal-title" style="color: white;">Confirmación</h5>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro que deseas eliminar el servicio?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #e4ac00; color: white;" data-dismiss="modal" onclick="closeModal()">Cancelar</button>
                    <button type="button" class="btn" style="background-color: #ff3131; color: white;" id="confirmDelete">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentServiceId = null;

        // Abre el modal
        function openModal(serviceId) {
            currentServiceId = serviceId;
            document.getElementById('confirmModal').style.display = 'block';
        }

        // Cierra el modal
        function closeModal() {
            document.getElementById('confirmModal').style.display = 'none';
        }

        // Confirma la eliminación del servicio
        document.getElementById('confirmDelete').addEventListener('click', function() {
            document.getElementById('deleteForm').submit();
        });
    </script>
</x-layout>