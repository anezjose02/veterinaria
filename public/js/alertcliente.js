$("a#delete-link").on("click", function (e) {
    e.preventDefault();
    let _token = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).data("id");
    swal({
        title: "Estas seguro(a)?",
        text: "Una vez eliminado,¡no podrá recuperar este cliente!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: 'deleteCliente',
                    type: "POST",
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function (data) {
                        swal("El cliente(a) ha sido eliminado!", {
                            icon: "success",
                        });
                        setTimeout(function () {
                            location.reload();
                        }, 1000);

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error al eliminar cliente: " + thrownError, {
                            icon: "error",
                        });
                    },
                });
            } else {
                swal("¡Se canceló la eliminación del cliente!");
            }
        });
});