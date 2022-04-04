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
                                <h3>Importación de datos</h3>
                                <div id="home" class="container"><br>
                                    <form class="container" id="frmcargararchivo" name="frmcargararchivo" method="post" enctype="multipart/form-data">
                                        <div class="col-xs-12 col-md-12 text-center">
                                            <div class="col-xs-12 col-md-12 text-center">
                                                <button class="btn btn-info" id="btnVentas" type="button" value="Ventas por día">
                                                    <i class="fa fa-check"></i> Ventas por día
                                                </button>
                                                <button class="btn btn-success" id="btnPedidos" type="button" value="Pedidos por sector">
                                                    <i class="fa fa-check"></i>Pedidos por día
                                                </button>
                                                <button class="btn btn-dark" id="btnPromedio" type="button" value="Promedio pedido">
                                                    <i class="fa fa-check"></i>Promedio del pedido
                                                </button>
                                            </div>
                                        </div>
                                        <div id="mensaje" class="alert alert-success"></div>
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
<script src="scripts/reportesPedidos.js" type="text/javascript"></script>