$(document).ready(function () {
    $('#submit').submit(function (e) {
        e.preventDefault();
        let documento_identidad = $('#documento_identidad').val();
        let fecha = $('#fecha').val();
        let hora = $('#hora').val();
        let mascota = $('#mascota').val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "post",
            url: 'guardarCita',
            data: {
                _token: _token,
                documento_identidad: documento_identidad,
                fecha: fecha,
                hora: hora,
                mascota: mascota
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
});

$(document).ready(function () {
    var currentDate = new Date();
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1;
    var year = currentDate.getFullYear();

    if (day < 10) {
        day = '0' + day;
    }

    if (month < 10) {
        month = '0' + month;
    }

    var todayDate = year + '-' + month + '-' + day;
    $('#fecha').attr('min', todayDate);
});

