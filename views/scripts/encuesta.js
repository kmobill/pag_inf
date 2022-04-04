var tabla;
function init() { /* función inicial */
    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
    pnlTRX(false, true);
    pnlEncuestaOscus(false, true);
   
    $('#txtConvencional').attr('readonly', true);
    $('#txtCorreo').attr('readonly', true);
    $("#btnGuardar").prop("disabled", true);
}

function limpiar_formulario() {
    document.getElementById("formulario").reset();
    pnlTRX(false, true);
    pnlEncuestaOscus(false, true);
//    $("#pnlEncuestaOscus").hide();
//    $('#encuestaOscus').hide();
    $('#respuesta2').attr('required', false);
    $('#respuesta2').attr('readonly', true);
    $('#respuesta4').attr('required', false);
    $('#respuesta4').attr('readonly', true);
    $('#respuesta6').attr('required', false);
    $('#respuesta6').attr('readonly', true);
    $('#respuesta8').attr('required', false);
    $('#respuesta8').attr('readonly', true);
    $('#respuesta10').attr('required', false);
    $('#respuesta10').attr('readonly', true);
    $('#txtConvencional').attr('readonly', true);
    $('#txtCorreo').attr('readonly', true);
}

function cancelar_formulario() {
    $("#btnNuevaGestion").prop("disabled", false);
    $("#btnGuardar").prop("disabled", true);
    limpiar_formulario();
}

function nuevaGestion() {
    $("#btnGuardar").prop("disabled", false);
    $("#btnNuevaGestion").prop("disabled", true);
    document.getElementById("formulario").reset();
    pnlTRX(true, false);
    pnlEncuestaOscus(true, false);
    $('#respuesta2').attr('required', false);
    $('#respuesta2').attr('readonly', true);
    $('#respuesta4').attr('required', false);
    $('#respuesta4').attr('readonly', true);
    $('#respuesta6').attr('required', false);
    $('#respuesta6').attr('readonly', true);
    $('#respuesta8').attr('required', false);
    $('#respuesta8').attr('readonly', true);
    $('#respuesta10').attr('required', false);
    $('#respuesta10').attr('readonly', true);
    $('#txtConvencional').attr('readonly', false);
    $('#txtCorreo').attr('readonly', false);
}

$('#txtIdentificacion').blur(function () {
    var identificacion = $('#txtIdentificacion').val();
    if (identificacion == '9999999999') {
        $('#txtNombreCliente').val("Sin Nombres");
    }
});

$('#respuesta1').change(function () {
    if ($('#respuesta1').val() == '1' || $('#respuesta1').val() == '2' || $('#respuesta1').val() == '3' ||
        $('#respuesta1').val() == '4' || $('#respuesta1').val() == '5' || $('#respuesta1').val() == '6') {
        $('#pregunta2').show();
        $('#respuesta2').show();
        $('#respuesta2').attr('required', true);
        $('#respuesta2').attr('readonly', false);

    } else {
        $('#pregunta2').hide();
        $('#respuesta2').hide();
        $('#respuesta2').attr('required', false);
        $('#respuesta2').attr('readonly', true);
    }
});

$('#respuesta3').change(function () {
    if ($('#respuesta3').val() == '0' || $('#respuesta3').val() == '1' || $('#respuesta3').val() == '2' || $('#respuesta3').val() == '3' ||
        $('#respuesta3').val() == '4' || $('#respuesta3').val() == '5' || $('#respuesta3').val() == '6') {
        $('#pregunta4').val("¿Por qué seleccionó ese grado de recomendación?");
        $('#pregunta4').show();
        $('#respuesta4').show();
        $('#respuesta4').attr('required', true);
        $('#respuesta4').attr('readonly', false);
    } else if ($('#respuesta3').val() == '7' || $('#respuesta3').val() == '8' || $('#respuesta3').val() == '9') {
        $('#pregunta4').val("¿Me puede indicar qué hizo falta para llegar al 10 y que nos recomiende? ");
        $('#pregunta4').show();
        $('#respuesta4').show();
        $('#respuesta4').attr('required', true);
        $('#respuesta4').attr('readonly', false);
    } else {
        $('#pregunta4').val("");
        $('#pregunta4').hide();
        $('#respuesta4').hide();
        $('#respuesta4').attr('required', false);
        $('#respuesta4').attr('readonly', true);
    }
});

$('#respuesta5').change(function () {
    if ($('#respuesta5').val() == 'Poco fácil' || $('#respuesta5').val() == 'Difícil' || $('#respuesta5').val() == 'Muy difícil') {
        $('#pregunta6').show();
        $('#respuesta6').show();
        $('#respuesta6').attr('required', true);
        $('#respuesta6').attr('readonly', false);

    } else {
        $('#pregunta6').hide();
        $('#respuesta6').hide();
        $('#respuesta6').attr('required', false);
        $('#respuesta6').attr('readonly', true);
    }
});

$('#respuesta7').change(function () {
    if ($('#respuesta7').val() == 'Hasta 1 año' || $('#respuesta7').val() == 'No quiero seguir') {
        $('#pregunta8').show();
        $('#respuesta8').show();
        $('#respuesta8').attr('required', true);
        $('#respuesta8').attr('readonly', false);

    } else {
        $('#pregunta8').hide();
        $('#respuesta8').hide();
        $('#respuesta8').attr('required', false);
        $('#respuesta8').attr('readonly', true);
    }
});

$('#respuesta9').change(function () {
    if ($('#respuesta9').val() == '1' || $('#respuesta9').val() == '2' || $('#respuesta9').val() == '3' || $('#respuesta9').val() == '4') {
        $('#pregunta10').show();
        $('#respuesta10').show();
        $('#respuesta10').attr('required', true);
        $('#respuesta10').attr('readonly', false);

    } else {
        $('#pregunta10').hide();
        $('#respuesta10').hide();
        $('#respuesta10').attr('required', false);
        $('#respuesta10').attr('readonly', true);
    }
});

$('#txtEstadoEncuesta').change(function () {
    if ($('#txtEstadoEncuesta').val() != 'No aplica') {
        $('#pnlEncuestaOscus').show();
        pnlEncuestaOscus(true, false);

    } else {
        $('#pnlEncuestaOscus').hide();
        pnlEncuestaOscus(false, true);
        $('#respuesta2').attr('required', false);
        $('#respuesta2').attr('readonly', true);
        $('#respuesta4').attr('required', false);
        $('#respuesta4').attr('readonly', true);
        $('#respuesta6').attr('required', false);
        $('#respuesta6').attr('readonly', true);
        $('#respuesta8').attr('required', false);
        $('#respuesta8').attr('readonly', true);
        $('#respuesta10').attr('required', false);
        $('#respuesta10').attr('readonly', true);
        $('#respuesta1').val("");
        $('#respuesta2').val("");
        $('#respuesta3').val("");
        $('#respuesta4').val("");
        $('#respuesta5').val("");
        $('#respuesta6').val("");
        $('#respuesta7').val("");
        $('#respuesta8').val("");
        $('#respuesta9').val("");
        $('#respuesta10').val("");
    }
});

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/encuestaC.php?action=save",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            if (datos == 'Error: registro no se pudo almacenar' || datos == "Error: registro no se pudo actualizar" || datos == "Error de almacenamiento") {
                bootbox.alert("Por favor, intente almacenar nuevamente!");
                $("#btnGuardar").prop("disabled", false);
            } else {
                bootbox.alert(datos);
                $("#btnNuevaGestion").prop("disabled", false);
                $("#btnGuardar").prop("disabled", true);
                limpiar_formulario();
            }
        }
    });
}

init(); /* ejecuta la función inicial */

//state1 = required, state2 = readonly
function pnlTRX(state1, state2) {
    $('#chkHoraFin').attr('disabled', state2);
    $('#horaInicio').attr('required', state1);
    $('#horaInicio').attr('readonly', state2);
    $('#txtCooperativa').attr('required', state1);
    $('#txtCooperativa').attr('readonly', state2);
    $('#txtTipoLlamada').attr('required', state1);
    $('#txtTipoLlamada').attr('readonly', state2);
    $('#txtEstadoLlamada').attr('required', state1);
    $('#txtEstadoLlamada').attr('readonly', state2);
    $('#txtIdentificacion').attr('required', state1);
    $('#txtIdentificacion').attr('readonly', state2);
    $('#txtNombreCliente').attr('required', state1);
    $('#txtNombreCliente').attr('readonly', state2);
    $('#txtCiudadCliente').attr('required', state1);
    $('#txtCiudadCliente').attr('readonly', state2);
    $('#txtCelular').attr('required', state1);
    $('#txtCelular').attr('readonly', state2);
    $('#txtTipoCliente').attr('required', state1);
    $('#txtTipoCliente').attr('readonly', state2);
    $('#txtMotivoLlamada').attr('required', state1);
    $('#txtMotivoLlamada').attr('readonly', state2);
    $('#txtSubmotivoLlamada').attr('required', state1);
    $('#txtSubmotivoLlamada').attr('readonly', state2);
    $('#txtObservaciones').attr('required', state1);
    $('#txtObservaciones').attr('readonly', state2);
    $('#txtEstadoCliente').attr('required', state1);
    $('#txtEstadoCliente').attr('readonly', state2);
    $('#txtTranferencia').attr('required', state1);
    $('#txtTranferencia').attr('readonly', state2);
    $('#txtObsTranferencia').attr('required', state1);
    $('#txtObsTranferencia').attr('readonly', state2);
}

function pnlEncuestaOscus(state1, state2) {
    $('#txtEstadoEncuesta').attr('required', state1);
    $('#txtEstadoEncuesta').attr('readonly', state2);
    $('#respuesta1').attr('required', state1);
    $('#respuesta1').attr('readonly', state2);
    $('#pregunta2').hide();
    $('#respuesta2').hide();
    $('#respuesta3').attr('required', state1);
    $('#respuesta3').attr('readonly', state2);
    $('#pregunta4').hide();
    $('#respuesta4').hide();
    $('#respuesta5').attr('required', state1);
    $('#respuesta5').attr('readonly', state2);
    $('#pregunta6').hide();
    $('#respuesta6').hide();
    $('#respuesta7').attr('required', state1);
    $('#respuesta7').attr('readonly', state2);
    $('#pregunta8').hide();
    $('#respuesta8').hide();
    $('#respuesta9').attr('required', state1);
    $('#respuesta9').attr('readonly', state2);
    $('#pregunta10').hide();
    $('#respuesta10').hide();
}

function onlyNumbers(e) {
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48 && key <= 57) || (key == 8));
}