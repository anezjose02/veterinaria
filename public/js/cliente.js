//
var mascotas = [];
//Tarjetas
const personalcard = document.getElementById('personal-card');
const mascotacard = document.getElementById('mascota-card');
//Botones
const nextBtn = document.getElementById('next');
const nextBtn2 = document.getElementById('next2');
const nextBtn3 = document.getElementById('next3');
const prevBtn = document.getElementById('prev');
//Inputs
var valores = [];
const doc_identidad = document.getElementById('doc_identidad');
const nombres = document.getElementById('nombres');
const apellidos = document.getElementById('apellidos');
const telefono = document.getElementById('telefono');
const correo = document.getElementById('correo');
var idMascota = $('#id_mascota\\[\\]').val();
var nombreMascota = $('#nombre_mascota\\[\\]').val();
var tipoMascota = $('#tipo_mascota\\[\\]').val();
let _token = $('meta[name="csrf-token"]').attr('content');
nextBtn.addEventListener('click', () => {
    if (
        doc_identidad.value === "" ||
        nombres.value === "" ||
        apellidos.value === "" ||
        telefono.value === "" ||
        correo.value === ""
    ) {
        alert("Por favor complete todos los campos antes de continuar.");
        return;
    }
    personalcard.style.display = 'none';
    mascotacard.style.display = '';
});

prevBtn.addEventListener('click', () => {
    mascotacard.style.display = 'none';
    personalcard.style.display = '';
});

nextBtn2.addEventListener('click', () => {
    // Obtener la tabla
    var table = document.getElementById("table_field");

    // Obtener el número de filas en la tabla
    var rowCount = table.rows.length;

    // Crear un array para almacenar los valores de los campos de entrada
    mascotas = [];

    // Obtener el valor de doc_identidad
    const docIdentidad = document.getElementById('doc_identidad').value;

    // Iterar a través de cada fila de la tabla
    for (var i = 1; i < rowCount; i++) {

        // Obtener el número de fila y agregar ceros a la izquierda para completar 2 dígitos
        var rowNumber = ("0" + i).slice(-2);

        // Crear el identificador de la mascota utilizando el valor de doc_identidad y la sucesión de dos números
        var idMascota = docIdentidad + "_#" + rowNumber;

        // Obtener el nombre de la mascota
        var nombreMascota = table.rows[i].cells[1].getElementsByTagName("input")[0].value;

        // Obtener el tipo de la mascota
        var tipoMascota = table.rows[i].cells[2].getElementsByTagName("select")[0].value;

        if (idMascota && nombreMascota && tipoMascota) {
            // todos los valores están definidos y no son vacíos
            mascotas.push({
                id_mascota: idMascota,
                nombre_mascota: nombreMascota,
                tipo_mascota: tipoMascota
            });
            // Actualizar el valor del campo "Identificador Mascota" en la tabla
            table.rows[i].cells[0].getElementsByTagName("input")[0].value = idMascota;
            nextBtn3.style.display = '';
        } else {
            // al menos uno de los valores es null o vacío
            alert("Por favor, complete todos los campos antes de agregar la mascota.");
        }
    }
});

nextBtn3.addEventListener('click', () => {
    let insert_documento_identidad = $('#doc_identidad').val();
    let insert_nombre = $('#nombres').val();
    let insert_apellidos = $('#apellidos').val();
    let insert_correo = $('#correo').val();
    let insert_telefono = $('#telefono').val();
    let insert_value = mascotas;
    $.ajax({
        type: "post",
        url: 'guardarCliente',
        data: {
            _token: _token,
            doc_identidad: insert_documento_identidad,
            nombres: insert_nombre,
            apellidos: insert_apellidos,
            correo: insert_correo,
            telefono: insert_telefono,
            mascotas: insert_value,
        },
        success: function (response) {
            if (response.status === 'success') {
                alert(response.message);
                location.reload();
            } else {
                alert(response.message);
            }
        }
    });
});