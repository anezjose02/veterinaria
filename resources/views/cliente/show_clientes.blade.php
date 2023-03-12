@php
    use App\Models\Mascotas;
@endphp
<div class="modal fade" id="edit-{{ $cliente->id }}" tabindex="-1" role="dialog" aria-labelledby="showModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Datos del Cliente
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" data-id="{{ $cliente->id }}"></button>
            </div>
            <div class="modal-body">
                <form action="/cliente/{{ $cliente->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <input type="hidden" name="id" {{ $cliente->id }}>
                        <div class="row mb-3">
                            <label for="doc_identidad" class="col-sm-2 col-form-label">Documento de
                                Identidad</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="doc_identidad"
                                    value="{{ $cliente->cedula_identidad }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nombres" class="col-sm-2 col-form-label">Nombres</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombres" name="nombres"
                                    value="{{ $cliente->nombres }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="apellidos" name="apellidos"
                                    value="{{ $cliente->apellidos }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    value="{{ $cliente->telefono }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="correo" name="correo"
                                    value="{{ $cliente->correo }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary float-start"
                                    style="display: none;">Anterior</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary float-end" id="next"
                                    name="next">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
