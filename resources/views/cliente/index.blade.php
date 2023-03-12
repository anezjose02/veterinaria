@include('layouts.user-header')
@php
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">

<body style="background-color:#E9FEFC;">
    <div class="container-fluid">
        @include('cliente.add_clientes_mascotas')

        @include('layouts.user-sidebar')
        <div class="col px-0 text-center">
            <h1 class="mt-5">Clientes<?php ?> </h1>
            <div class="row mx-0 mt-5">
                <div class="d-flex justify-content-center">
                    <div class="container">
                        <div class="container mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="me-2"></span>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="bi bi-person-plus-fill"></i> Agregar Cliente
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <label class="input-group-text" for="busqueda">Buscar:</label>
                                        <input class="form-control" type="text" id="busqueda"
                                            placeholder="Buscar...">
                                    </div>
                                </div>
                            </div>
                            <table id="clientes" class="table table-bordered border-dark" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre Completo</th>
                                        <th>Documento de Identidad</th>
                                        <th>Teléfono</th>
                                        <th>Correo Electrónico</th>
                                        <th>Mascotas</th>
                                        <th>Acciones</th>
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
                                                    data-bs-target="#show-{{ $cliente->id }}" data-name="Ver Mascotas">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                @include('cliente.show_mascotas')
                                            </td>
                                            <td class="text-center">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#edit-{{ $cliente->id }}"
                                                    class="btn btn-warning hover-name" data-name="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                @include('cliente.show_clientes')
                                                <a href="#" class="btn btn-danger hover-name" id="delete-link"
                                                    data-id="{{ $cliente->id }}" data-name="Eliminar">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/datatable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cliente.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/repeater.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/alertcliente.js') }}"></script>
</body>
@include('layouts.user-footer')



</html>
