<x-layout titulo="Citas">
    <div class="container my-4">
        <h1 class="text-center mb-4">Citas</h1>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($citas as $cita)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <!-- Nombre del Cliente -->
                            <p><strong>Nombre:</strong> {{ $cita->nombre }}</p>

                            <!-- Fecha de la cita -->
                            <p><strong>Fecha:</strong> 
                                {{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}
                            </p>

                            <!-- Hora de la cita -->
                            <p><strong>Hora:</strong> 
                                @php
                                    $time = \Carbon\Carbon::parse($cita->hora);
                                    $formattedTime = $time->format('g:i A');
                                @endphp
                                {{ $formattedTime }}
                            </p>

                            <!-- Servicios -->
                            @if($cita->servicios->count() > 0)
                                <p><strong>Servicios:</strong> 
                                    @foreach($cita->servicios as $servicio)
                                        {{ $servicio->servicio }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                </p>
                            @endif

                            <!-- Comentario -->
                            @if($cita->comentario)
                                <p><strong>Comentario:</strong> {{ $cita->comentario }}</p>
                            @endif
                        </div>

                        <!-- Botones de acciones -->
                        <div class="card-footer mt-3 d-flex justify-content-between">
                            <a href="{{ route('cita.show', $cita) }}" class="btn" style="background-color: #004aad; color: white; margin-right: 5px;">Ver</a>
                            <a href="{{ route('cita.edit', $cita) }}" class="btn" style="background-color: #e4ac00; color: white; margin-right: 5px;">Editar</a>

                            <!-- Formulario de borrado con confirmación modal -->
                            <form action="{{ route('cita.destroy', $cita) }}" method="POST" class="d-inline" id="deleteForm{{ $cita->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn" style="background-color: #ff3131; color: white;" onclick="openModal('{{ $cita->id }}')">Borrar</button>
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
                    <p>¿Estás seguro que deseas eliminar la cita?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #e4ac00; color: white;" onclick="closeModal()">Cancelar</button>
                    <button type="button" class="btn" style="background-color: #ff3131; color: white;" id="confirmDelete">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentCitaId = null;

        // Abre el modal
        function openModal(citaId) {
            currentCitaId = citaId;
            document.getElementById('confirmModal').style.display = 'block';
        }

        // Cierra el modal
        function closeModal() {
            document.getElementById('confirmModal').style.display = 'none';
        }

        // Confirma la eliminación de la cita
        document.getElementById('confirmDelete').addEventListener('click', function() {
            document.getElementById('deleteForm' + currentCitaId).submit();
        });
    </script>
</x-layout>
