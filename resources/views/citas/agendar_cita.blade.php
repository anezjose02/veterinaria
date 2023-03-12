@php
    use App\Models\Mascotas;
@endphp
<div class="modal fade" id="agendar-{{ $cliente->id }}" tabindex="-1" role="dialog" aria-labelledby="showModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Cita para el Cliente: {{ $cliente->nombres }} {{ $cliente->apellidos }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" data-id="{{ $cliente->id }}"></button>
            </div>
            <div class="modal-body">
                <form action="{{ action('App\Http\Controllers\CitasController@store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="documento_identidad" id="documento_identidad"
                            value="{{ $cliente->cedula_identidad }}">
                        <div class="row mb-3">
                            <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="fecha" name="fecha"
                                    min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="hora" class="col-sm-2 col-form-label">hora</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" id="hora" name="hora" required
                                    min="09:00" max="16:00" value="09:00">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="apellidos" class="col-sm-2 col-form-label">Mascota</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="mascota" id="mascota" required>
                                    <option selected>Selecciona una Mascota</option>
                                    @php
                                        $mascotas = Mascotas::where('id_cliente', $cliente->cedula_identidad)->get();
                                    @endphp
                                    @foreach ($mascotas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary float-start"
                                    style="display: none;">Anterior</button>
                            </div>
                            <div class="col-6">
                                <input class="btn btn-primary" type="submit" value="Agregar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
