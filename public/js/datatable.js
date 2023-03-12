$(document).ready(function () {
    // Configuración de DataTable
    var table = $('#clientes').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
        },
        "pageLength": 10,
        "searching": true, // Deshabilitar el buscador de DataTable
        "ordering": false,
        "info": false
    });

    // Crear un input de búsqueda personalizado
    $('#busqueda').on('keyup', function () {
        table.search(this.value).draw();
    });
});

$(document).ready(function () {
    // Configuración de DataTable
    var table = $('#mascotas').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
        },
        "pageLength": 10,
        "searching": true,
        "ordering": false,
        "info": false
    });

    // Crear un input de búsqueda personalizado
    $('#busqueda').on('keyup', function () {
        table.search(this.value).draw();
    });
});

$(document).ready(function () {
    // Configuración de DataTable
    var table = $('#agender_citas').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
        },
        "pageLength": 10,
        "searching": true,
        "ordering": false,
        "info": false
    });

    // Crear un input de búsqueda personalizado
    $('#busqueda').on('keyup', function () {
        table.search(this.value).draw();
    });
});

$(document).ready(function () {
    // Configuración de DataTable
    var table = $('#citas_creadas').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
        },
        "pageLength": 10,
        "searching": true,
        "ordering": false,
        "info": false
    });

    // Crear un input de búsqueda personalizado
    $('#busqueda').on('keyup', function () {
        table.search(this.value).draw();
    });
});