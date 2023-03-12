@php
    use App\Models\Mascotas;
@endphp
<div class="modal fade" id="show-{{ $cliente->id }}" tabindex="-1" role="dialog" aria-labelledby="showModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mascotas de
                    {{ $cliente->nombres }} {{ $cliente->apellidos }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" data-id="{{ $cliente->id }}"></button>
            </div>
            <div class="card-body">
                <div class="input-field">
                    <table class="table table-bordered" id="table_add_mascota">
                        <tr>
                            <th>Identificador Mascota </th>
                            <th>Nombre Mascota</th>
                            <th>Tipo Mascota</th>
                            <th>Action </th>
                        </tr>
                        <tr>
                            <form action="{{ action('App\Http\Controllers\MascotasController@store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_cliente" name="id_cliente"
                                    value="{{ $cliente->cedula_identidad }}">
                                <td><input class="form-control" type="text" id="id_mascota" name="id_mascota"
                                        placeholder="Se agrega automaticamente" disabled>
                                </td>
                                <td><input class="form-control" type="text" name="nombre_mascota"
                                        id="nombre_mascota">
                                </td>
                                <td><select class="form-select" id="tipo_mascota" name="tipo_mascota" id="tipo_mascota">
                                        <option selected>Seleccione Uno...</option>
                                        <option value="Perro">Perro</option>
                                        <option value="Gato">Gato</option>
                                        <option value="Conejo">Conejo</option>
                                        <option value="Caballo">Caballo</option>
                                        <option value="Otro">Otro</option>
                                    </select></td>
                                <td><input class="btn btn-primary" type="submit" value="Agregar"></td>
                            </form>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-body">
                @php
                    $mascotas = Mascotas::where('id_cliente', $cliente->cedula_identidad)->get();
                @endphp
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mascotas as $mascota)
                            <form action="/mascota/{{ $mascota->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <tr>
                                    <input type="hidden" name="id" value="{{ $mascota->id }}">
                                    <td>{{ $mascota->id }}</td>
                                    <td>
                                        <input type="text" class="form-control" name="nombre"
                                            value="{{ $mascota->nombre }}">
                                    </td>
                                    <td>
                                        <select class="form-select" id="tipo_mascota" name="tipo_mascota"
                                            id="tipo_mascota">
                                            <option selected>{{ $mascota->tipo_mascota }}</option>
                                            <option value="Perro">Perro</option>
                                            <option value="Gato">Gato</option>
                                            <option value="Conejo">Conejo</option>
                                            <option value="Caballo">Caballo</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </td>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-outline-primary"
                                            name="guardar[{{ $mascota->id }}]">Guardar</button>
                                    </td>
                                </tr>
                                </tr>
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
