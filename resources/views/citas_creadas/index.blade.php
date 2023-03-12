@include('layouts.user-header')
@php
    use App\Models\Clientes;
    use App\Models\Mascotas;
@endphp
@if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
    <script>
        setTimeout(function() {
            location.reload();
        }, 1500); // 1500 milisegundos = 1.5 segundos
    </script>
@endif

<body style="background-color:#E9FEFC;">
    <div class="container-fluid">
        @include('layouts.user-sidebar')
        <div class="col px-0 text-center">
            <h1 class="mt-5">Veterinaria Animales Contentos <?php ?> </h1>
            <h5 class="m5-5">Citas Creadas</h5>
            <div class="row mx-0 mt-5">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <label class="input-group-text" for="busqueda">Buscar:</label>
                            <input class="form-control" type="text" id="busqueda" placeholder="Buscar...">
                        </div>
                    </div>
                </div>
                <table id="citas_creadas" class="table table-bordered border-dark" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Cliente</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Mascota</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        @foreach ($citas as $cita)
                            <tr>
                                <td>@php
                                    $cliente = Clientes::select('nombres', 'apellidos')
                                        ->where('cedula_identidad', $cita->documento_identidad)
                                        ->first();
                                @endphp
                                    {{ $cliente->nombres }} {{ $cliente->apellidos }}
                                </td>
                                <td>{{ $cita->fecha_cita }}</td>
                                <td>{{ $cita->hora_cita }}</td>
                                <td>@php
                                    $mascota = Mascotas::find($cita->mascota);
                                @endphp
                                    {{ $mascota->nombre }}</td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit-{{ $cita->id }}"
                                        class="btn btn-warning hover-name" data-name="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @include('citas_creadas.editar_citas')
                                    <a href="#" class="btn btn-danger hover-name" id="delete-link"
                                        data-id="{{ $cita->id }}" data-name="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/datatable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/alertcitascreadas.js') }}"></script>
</body>
@include('layouts.user-footer')

</html>
