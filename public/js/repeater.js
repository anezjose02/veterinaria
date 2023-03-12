$(document).ready(function () {
    let html_td =
        '<tr><td><input class="form-control" type="text" name="id_mascota[]" id="id_mascota[]" placeholder="Se agrega automaticamente" disabled></td></td > ' +
        '<td><input class="form-control" type="text" name="nombre_mascota[]" id="nombre_mascota[]"></td>' +
        '<td><select class="form-select" id="tipo_mascota" name = "tipo_mascota[]" id="tipo_mascota[]" > ' +
        '<option selected>Seleccione Uno..</option>' +
        '<option value="Perro">Perro</option>' +
        '<option value="Gato">Gato</option>' +
        '<option value="Conejo">Conejo</option>' +
        '<option value="Caballo">Caballo</option >' +
        '<option value="Otro">Otro</option>' +
        '</select ></td>' +
        '<td><input class ="btn btn-danger" type = "button" value = "Remove" id = "remove" name ="Borrar"></td ></tr > ';
    $('#add').click(function () {
        $('#table_field').append(html_td);
    });
    $('#table_field').on('click', '#remove', function () {
        $(this).closest('tr').remove();
    });
});