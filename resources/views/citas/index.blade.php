@include('layouts.user-header')
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
            <div class="row mx-0 mt-5">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <label class="input-group-text" for="busqueda">Buscar:</label>
                            <input class="form-control" type="text" id="busqueda" placeholder="Buscar...">
                        </div>
                    </div>
                </div>
                <table id="agender_citas" class="table table-bordered border-dark" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre Completo</th>
                            <th>Documento de Identidad</th>
                            <th>Teléfono</th>
                            <th>Correo Electrónico</th>
                            <th>Citas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td class="text-center">{{ $cliente->id }}</td>
                                <td class="text-center">{{ $cliente->nombres }} {{ $cliente->apellidos }}
                                </td>
                                <td class="text-center">{{ $cliente->cedula_identidad }}</td>
                                <td class="text-center">{{ $cliente->telefono }}</td>
                                <td class="text-center">{{ $cliente->correo }}</td>
                                <td class="text-center">
                                    <a href="#" data-bs-toggle="modal" class="btn btn-info hover-name"
                                        data-bs-target="#agendar-{{ $cliente->id }}" data-name="Agendar Cita">
                                        <i class="bi bi-calendar"></i>
                                    </a>
                                    @include('citas.agendar_cita')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/datatable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/agendarcita.js') }}"></script>

</body>
@include('layouts.user-footer')


</html>
