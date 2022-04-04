<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- contenido -->
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h3>Importación de audios</h3>
                                <div id="home" class="container"><br>
                                    <form class="container" id="frmcargararchivo" name="frmcargararchivo" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-xs-3 col-md-3 col-lg-3 text-left">
                                                <b class="text-bold text-left text-bold">Nombre importación: </b>
                                                <input class="form-control" type="text" name="import" id="import" required />
                                            </div>
                                            <div class="col-xs-2 col-md-2 col-lg-2 text-left">
                                                <b class="text-bold text-left text-bold">Mapeo: </b>
                                                <select class="form-control" name="mapeo" id="mapeo" required>
                                                    <option></option>
                                                    <option>Canales de comunicación</option>
                                                </select>
                                            </div>
                                            <div class="row col-xs-3 col-md-3 col-lg-3 text-left">
                                                <b class="text-bold text-left text-bold">Tipo de canal: </b>
                                                <select class="form-control" name="canal" id="canal" name="mapeo" id="mapeo" required>
                                                    <option></option>
                                                    <option>Call center</option>
                                                    <option>Mail</option>
                                                    <option>SMS</option>
                                                    <option>Messenger</option>
                                                    <option>Whatsapp</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-4 col-md-4 col-lg-4 text-left">
                                                <b class="text-bold text-left text-bold">Seleccione un audio</b>
                                                <input class="form-control" type="file" name="excel" id="excel" />
                                                
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-12 text-center"><br></div>
                                        <div class="col-xs-12 col-md-12 text-center">
                                            <div class="col-xs-12 col-md-12 text-center">
                                                <button class="btn btn-info" id="btnGuardar" type="submit" value="Subir">
                                                    <i class="fa fa-upload"></i> Subir
                                                </button>
                                                <button class="btn btn-info" id="btnNuevaImp" type="button" value="Nueva" onclick="limpiar_formulario()">
                                                    <i class="fa fa-rotate-left"></i> Nueva importación
                                                </button>
                                            </div>
                                            <div class="col-xs-12 col-md-12">
                                                <div id="contenedor" class="col-xs-4 col-md-4" style="justify-content: center">
                                                    <div class="loader col-xs-4 col-md-4" style="" class="" id="loader">Loading...</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-12" id="mensaje">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
<?php require 'footer.php'; ?>
<script src="scripts/importAudios.js" type="text/javascript"></script>