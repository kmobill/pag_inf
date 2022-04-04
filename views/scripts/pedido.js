var tabla;
function init() { /* función inicial */
    mostrar_formulario(false);
    mostrar_todos();

    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
    $("#IDC").hide();
    $("#txtFechaInicio").hide();
}

function limpiar_formulario() { /* limpia los datos de los formularios */
    document.getElementById("formulario").reset();

}

function mostrar_formulario(flag) { /* muestra u oculta el formulario segun la validación del bool (flag) */
    limpiar_formulario();
    if (flag) {
        pnlTRX(true,false);
        $("#listadoRegistros").hide();
        $("#formularioRegistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnAgregar").hide();
    } else {
        pnlTRX(false,true);
        $("#listadoRegistros").show();
        $("#formularioRegistros").hide();
        $("#btnAgregar").show();
    }
}

function cancelar_formulario() { /* función para cancelar la operación */
    limpiar_formulario();
    mostrar_formulario(false);
}

function mostrar_todos() {
    tabla = $('#tblListado').dataTable({
        "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
        "aProcessing": true, /* activa el procesamiento de DataTables */
        "aServerSide": true, /* Paginación y filtrado realizado por el servidor */
        dom: '<Bl<f>rtip>', //Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/pedidosC.php?action=selectAll',
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
                "copyTitle": "Tabla Copiada",
                "copySuccess": {
                    _: '%d líneas copiadas',
                    1: '1 línea copiada'
                }
            }
        },
        "bDestroy": true,
        "iDisplayLength": 10, /* paginación */
        "order": [[5, "asc"]]
    }).DataTable();
    tabla.on('order.dt search.dt', function () {
        tabla.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
}

function mostrar_uno(Id) {
    $.post("../ajax/pedidosC.php?action=selectById", {Id: Id}, function (datos, estado) {
        datos = JSON.parse(datos);
        mostrar_formulario(true);
        $("#IDC").val(datos.Id);
        $('#txtIdentificacion').val(datos.Identificacion);
        $('#txtNombreCliente').val(datos.Nombres);
        $('#txtCelular').val(datos.Celular);
        $('#txtConvencional').val(datos.Convencional);
        $('#txtCorreo').val(datos.Correo);
        $('#txtSector').val(datos.Sector);
        $('#txtCallePrincipal').val(datos.CallePrincipal);
        $('#txtCalleSecundaria').val(datos.CalleSecundaria);
        $('#txtNumeracion').val(datos.Numeracion);
        $('#txtReferencia').val(datos.Referencia);
        $('#txtFormaPago').val(datos.FormaDePago);
        $('#txtTipoFacturacion').val(datos.TipoFacturacion);
        $('#txtEstadoPedido').val(datos.EstadoPedido);
    });
}

$("#btnAgregar").click(function () {
    limpiar_formulario();
    mostrar_formulario(true);
    $.ajax({
        type: "GET",
        url: '../ajax/pedidosC.php?action=fechaInicio',
        success: function (r) {
            $("#txtFechaInicio").val(r);
        }
    });
});

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnCalificaciones").trigger("click");
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/pedidosC.php?action=save",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            bootbox.alert(datos);
            mostrar_formulario(false);
            tabla.ajax.reload();
            limpiar_formulario();
        }
    });
}

function pnlTRX(state1, state2) {
    $('#txtIdentificacion').attr('required', state1);
    $('#txtIdentificacion').attr('readonly', state2);
    $('#txtNombreCliente').attr('required', state1);
    $('#txtNombreCliente').attr('readonly', state2);
    $('#txtCelular').attr('required', state1);
    $('#txtCelular').attr('readonly', state2);
    $('#txtSector').attr('required', state1);
    $('#txtSector').attr('readonly', state2);
    $('#txtCallePrincipal').attr('required', state1);
    $('#txtCallePrincipal').attr('readonly', state2);
    $('#txtCalleSecundaria').attr('required', state1);
    $('#txtCalleSecundaria').attr('readonly', state2);
    $('#txtNumeracion').attr('required', state1);
    $('#txtNumeracion').attr('readonly', state2);
    $('#txtReferencia').attr('required', state1);
    $('#txtReferencia').attr('readonly', state2);
    $('#txtFormaPago').attr('required', state1);
    $('#txtFormaPago').attr('readonly', state2);
    $('#txtTipoFacturacion').attr('required', state1);
    $('#txtTipoFacturacion').attr('readonly', state2);
}

init(); /* ejecuta la función inicial */