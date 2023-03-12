@php
    use App\Models\Mascotas;
@endphp
<div class="modal fade" id="edit-{{ $cita->id }}" tabindex="-1" role="dialog" aria-labelledby="showModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Cita para: {{ $mascota->nombre }} del Cliente
                    {{ $cliente->nombres }} {{ $cliente->apellidos }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" data-id="{{ $cita->id }}"></button>
            </div>
            <div class="modal-body">
                <form action="/citas_creadas/{{ $cita->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <input type="hidden" name="id" id="id" value="{{ $cita->id }}">
                        <div class="row mb-3">
                            <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="fecha" name="fecha"
                                    value="{{ $cita->fecha_cita }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="hora" class="col-sm-2 col-form-label">hora</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" id="hora" name="hora" required
                                    min="09:00" max="16:00" value="09:00">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary float-start"
                                    style="display: none;">Anterior</button>
                            </div>
                            <div class="col-6">
                                <input class="btn btn-primary" type="submit" value="Guardar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
