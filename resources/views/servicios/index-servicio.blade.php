<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicios</title>
</head>
<x-layout>
    <div class="container my-4">
        <h1 class="text-center mb-4">Servicios</h1>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($servicios as $servicio)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Servicio #{{ $servicio->id }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <small>{{ $servicio->servicio }}</small> <!-- Nombre del servicio en letras más pequeñas -->
                            </h6>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="{{ route('servicio.show', $servicio) }}" class="btn me-2" style="background-color: #004aad; color: white;">Ver</a>
                            <a href="{{ route('servicio.edit', $servicio) }}" class="btn me-2" style="background-color: #e4ac00; color: white;">Editar</a>
                            
                            <!-- Formulario para borrar el servicio con confirmación -->
                            <form action="{{ route('servicio.destroy', $servicio) }}" method="POST" class="d-inline" id="deleteForm{{ $servicio->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn mx-2" style="background-color: #ff3131; color: white;" onclick="openModal('{{ $servicio->id }}')">Borrar</button>

                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
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
            document.getElementById('deleteForm' + currentServiceId).submit();
        });
    </script>
</x-layout>
