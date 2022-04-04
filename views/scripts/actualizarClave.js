function init() { /* función inicial */
}

function limpiar_formulario() { /* limpia los datos de los formularios */
    $("#oldPassword").val("");
    $("#newPassword").val("");
    $("#newPassword2").val("");
}

$("#btnGuardar").click(function () {
    if ($("#newPassword").val() == "" || $("#newPassword2").val() == "") {
        bootbox.alert("Ingrese los datos solicitados, por favor!");
    } else if ($("#newPassword").val() != $("#newPassword2").val()) {
        bootbox.alert("Las contraseñas no coinciden!");
    } else {
        var pass = $("#oldPassword").val();
        var userId = $("#userId").val();
        var newPass = $("#newPassword").val();
        $.ajax({
            type: "POST",
            url: '../ajax/userC.php?action=cambiarClave',
            data: {pass: pass, userId: userId, newPass: newPass},
            success: function (r) {
                if (r == 0) {
                    CierraPopup();
                    bootbox.confirm("Por favor, vuelva a iniciar sesión", function (result) {
                        $(location).attr('href', '../ajax/logoutC.php');
                    });
                } else {
                    CierraPopup();
                    bootbox.alert("Error: contraseña no fue actualizada con éxito");
                }

            }
        });
    }
});

$("#btnCancelar").click(function () {
    limpiar_formulario();
});

function CierraPopup() {
    $("#cambioPassModal").modal('hide');//ocultamos el modal
    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
    limpiar_formulario();
}


init(); /* ejecuta la función inicial */

