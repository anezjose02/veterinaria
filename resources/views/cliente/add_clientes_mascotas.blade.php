<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card" id="personal-card">
                    <div class=" card-header">
                        <h5>Informacion del Cliente</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="doc_identidad" class="col-sm-2 col-form-label">Documento de
                                Identidad</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="doc_identidad"
                                    placeholder="Ingrese su documento de identidad">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nombres" class="col-sm-2 col-form-label">Nombres</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombres"
                                    placeholder="Ingrese sus nombres">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="apellidos"
                                    placeholder="Ingrese sus apellidos">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telefono"
                                    placeholder="Ingrese su número de teléfono">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="correo"
                                    placeholder="Ingrese su correo electrónico">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary float-start"
                                    style="display: none;">Anterior</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary float-end" id="next"
                                    name="next">Siguiente</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="mascota-card" style="display: none;">
                    <div class=" card-header">
                        <h5>Informacion de las Mascotas</h5>
                    </div>
                    <div class="card-body">
                        <div class="input-field">
                            <table class="table table-bordered" id="table_field">
                                <tr>
                                    <th>Identificador Mascota </th>
                                    <th>Nombre Mascota</th>
                                    <th>Tipo Mascota</th>
                                    <th>Action </th>
                                </tr>
                                <tr>
                                    <td><input class="form-control" type="text" id="id_mascota[]" name="id_mascota[]"
                                            placeholder="Se agrega automaticamente" disabled>
                                    </td>
                                    <td><input class="form-control" type="text" name="nombre_mascota[]"
                                            id="nombre_mascota[]">
                                    </td>
                                    <td><select class="form-select" id="tipo_mascota" name="tipo_mascota[]"
                                            id="tipo_mascota[]">
                                            <option selected>Seleccione Uno...</option>
                                            <option value="Perro">Perro</option>
                                            <option value="Gato">Gato</option>
                                            <option value="Conejo">Conejo</option>
                                            <option value="Caballo">Caballo</option>
                                            <option value="Otro">Otro</option>
                                        </select></td>
                                    <td><input class="btn btn-warning" type="button" value="Add" id="add"
                                            name="add"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary me-auto" id="prev"
                                name="prev">Anterior</button>
                            <div class="ms-auto">
                                <button type="button" id="next2" name="next2"
                                    class="btn btn-outline-primary">Generar Identificador</button>
                                <button type="button" id="next3" name="next3" class="btn btn-primary"
                                    style="display: none;">Finalizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
