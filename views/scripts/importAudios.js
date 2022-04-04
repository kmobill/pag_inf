var tabla;
function init() { /* función inicial */
    $("#contenedor").hide();
    $("#frmcargararchivo").on("submit", function (e) {
        guardar_datos(e);
    });
    $("#btnNuevaImp").prop("disabled", true);
    $('#tblListado').hide();
}

function limpiar_formulario() {
    document.getElementById("frmcargararchivo").reset();
    $("#import").val("");
    $("#mapeo option:selected").prop('selected', false).find('option:first').prop('selected', true);
    $("#campaign").val("");
    $("#excel").val("");
    $("#btnGuardar").prop("disabled", false);
    $("#contenedor").hide();
    $("#btnNuevaImp").prop("disabled", true);
    $("#mensaje").html("");
}

function limpiarPnlCancel() {
    $("#campaignId").val("");
    $("#importation").val("");
    $("#acciones").val("");
    $('#tblListado').hide();
    tabla.destroy(); // esta línea permite limpiar un datatable almacenada en una variable
}

$("#btnMostrar").click(function () {
    $('#tblListado').show();
    var campaign = $("#campaignId").val();
    var base = $("#importation").val();
    if (campaign != "" && base != "") {
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
                url: '../ajax/importationC.php?action=showAll',
                data: {
                    campaign: campaign,
                    base: base
                },
                type: "post",
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
            "order": [[0, "asc"]]
        }).DataTable();
    } else {
        bootbox.alert({
            message: "Seleccione campaña e importación para continuar!",
            size: 'medium'
        });
    }
});

$("#campaignId").change(function () {
    var campaign = $("#campaignId").val();
    $.ajax({
        url: "../ajax/importationC.php?action=bases",
        type: 'post',
        data: {
            camp: campaign
        },
        success: function (data) {
            $("#importation").html(data);
        }
    });
});

function guardar_datos(e) {
    $("#btnGuardar").prop("disabled", true);
    $("#contenedor").show();
    e.preventDefault(); //No se activará la acción predeterminada del evento
    console.log($("#mapeo").val());
    if (document.frmcargararchivo.excel.value == "")
    {
        bootbox.alert("Seleccione un audio");
        document.frmcargararchivo.excel.focus();
        return false;
    } else if ($("#mapeo").val() == "Canales de comunicación") {
        var formData = new FormData($("#frmcargararchivo")[0]);
        $.ajax({
            url: "../ajax/importationC.php?action=audios",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#contenedor").hide();
                $("#mensaje").html(datos);
                $("#btnNuevaImp").prop("disabled", false);
            }
        });
    }
}

init(); /* ejecuta la función inicial */
