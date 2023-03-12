@include('layouts.user-header')
@php
    use App\Models\Clientes;
    use App\Models\Mascotas;
@endphp

<body style="background-color:#E9FEFC;">
    <div class="container-fluid">
        @include('layouts.user-sidebar')
        <div class="col px-0 text-center">
            <h1 class="mt-5">Veterinaria Animales Contentos <?php ?> </h1>
            <div class="row row-cols-1 row-cols-md-5 g-4">
                <div class="col">
                    <div class="card h-100 border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Perros</h5>
                            <p class="card-text">
                                @php
                                    $perros = Mascotas::where('tipo_mascota', 'perro')->count();
                                    echo 'Hay ' . $perros . ' mascotas de tipo perro.';
                                @endphp
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Gatos</h5>
                            <p class="card-text"> @php
                                $gatos = Mascotas::where('tipo_mascota', 'gato')->count();
                                echo 'Hay ' . $gatos . ' mascotas de tipo gato.';
                            @endphp</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Conejos</h5>
                            <p class="card-text">
                                @php
                                    $conejos = Mascotas::where('tipo_mascota', 'conejo')->count();
                                    echo 'Hay ' . $conejos . ' mascotas de tipo conejo.';
                                @endphp
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Caballos</h5>
                            <p class="card-text">
                                @php
                                    $caballos = Mascotas::where('tipo_mascota', 'caballo')->count();
                                    echo 'Hay ' . $caballos . ' mascotas de tipo caballo.';
                                @endphp
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Otros</h5>
                            <p class="card-text">
                                @php
                                    $otros = Mascotas::where('tipo_mascota', 'otro')->count();
                                    echo 'Hay ' . $otros . ' mascotas de tipo otro.';
                                @endphp
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-0 mt-5">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <label class="input-group-text" for="busqueda">Buscar:</label>
                            <input class="form-control" type="text" id="busqueda" placeholder="Buscar...">
                        </div>
                    </div>
                </div>
                <br>
                <table id="mascotas" class="table table-bordered border-dark" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Identificador Mascota</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo Mascota</th>
                            <th scope="col">Cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mascota as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->identificador_mascota }}</td>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->tipo_mascota }}</td>
                                <td>
                                    @php
                                        $cliente = Clientes::select('nombres', 'apellidos')
                                            ->where('cedula_identidad', $item->id_cliente)
                                            ->first();
                                    @endphp
                                    {{ $cliente->nombres }} {{ $cliente->apellidos }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/datatable.js') }}"></script>
</body>
@include('layouts.user-footer')

</html>
