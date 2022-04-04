<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- contenido -->
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <div id="home" class="container"><br>
                                    <!-- [ breadcrumb ] start -->
                                    <div class="box-header with-border"> 
                                        <h2 class="card-title">Pedidos</h2>
                                        <div class="card-title text-right">
                                            <button class="btn btn-info" id="btnAgregar" type="button" value="Registrar pedido"><i class="fa fa-plus"></i> Registrar pedido</button>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- [ breadcrumb ] end -->

                                    <div class="col-md-12 col-xs-12" id="divContenido">
                                        <!-- [ Hover-table ] start -->
                                        <div class="col-xl-12" id="listadoRegistros">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Listado de pedidos</h5>
                                                </div>
                                                <div class="card-block table-border-style">
                                                    <div class="table-responsive">
                                                        <table id="tblListado" class="table table-hover">
                                                            <thead>
                                                            <th>#</th>
                                                            <th>Identificacion</th>
                                                            <th>Nombres</th>
                                                            <th>Sector</th>
                                                            <th>Dirección</th>
                                                            <th>Estado pedido</th>
                                                            <th>Acciones</th>
                                                            </thead>
                                                            <tbody>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- [ Hover-table ] end -->
                                        <div class="panel-body" id="formularioRegistros">
                                            <form name="formulario" id="formulario" method="POST" class="">
                                                <input type="text" class="form-control input-sm" id="IDC" name="IDC"/>
                                                <input type="text" class="form-control input-sm" id="txtFechaInicio" name="txtFechaInicio"/>
                                                <div class="col-xs-12 col-md-12 col-lg-12 text-center"><b class="text-center">BLOQUE A - Datos del cliente</b></div>
                                                <div class="row col-xs-12 col-md-12 col-lg-12">
                                                    <div class="col-xs-3 col-md-3 col-lg-3">
                                                        <label class="text-light-blue">Identificación del cliente</label>
                                                        <input onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtIdentificacion" name="txtIdentificacion"  maxlength="15"/>
                                                    </div>
                                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                                        <label class="text-light-blue">Nombre del cliente</label>
                                                        <input type="text" class="form-control input-sm" id="txtNombreCliente" name="txtNombreCliente" required/>
                                                    </div>
                                                    <div class="col-xs-3 col-md-3 col-lg-3">
                                                        <label class="text-light-blue">Celular del cliente</label>
                                                        <input pattern="^09(\d{8})$" onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtCelular" name="txtCelular" maxlength="15"/>
                                                    </div>
                                                    <div class="col-xs-3 col-md-3 col-lg-3">
                                                        <label class="text-light-blue">Teléfono convencional del cliente</label>
                                                        <input pattern="^(0[2-7])(\d{7})$" onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtConvencional" name="txtConvencional" maxlength="15"/>
                                                    </div>
                                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                                        <label class="text-light-blue">Correo del cliente</label>
                                                        <input pattern="[a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*@[a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{1,5}" id="txtCorreo" name="txtCorreo" type="text" class="form-control" maxlength="150">
                                                    </div>
                                                    <div class="col-xs-3 col-md-3 col-lg-3">
                                                        <label class="text-light-blue">Sector del cliente</label>
                                                        <select id="txtSector" name="txtSector" class="form-control">
                                                            <option value=""></option>
                                                            <option >Norte</option>
                                                            <option >Sur</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row col-xs-12 col-md-12 col-lg-12">
                                                    <div class="col-xs-12 col-md-12 col-lg-12 text-center"><b class="text-center">BLOQUE B - Datos para la entrega</b></div>
                                                    <div class="col-xs-5 col-md-5 col-lg-5">
                                                        <label class="text-light-blue">Calle principal</label>
                                                        <input type="text" class="form-control input-sm" id="txtCallePrincipal" name="txtCallePrincipal" maxlength="50"/>
                                                    </div>
                                                    <div class="col-xs-2 col-md-2 col-lg-2">
                                                        <label class="text-light-blue">Numeración</label>
                                                        <input type="text" class="form-control input-sm" id="txtNumeracion" name="txtNumeracion" maxlength="20"/>
                                                    </div>
                                                    <div class="col-xs-5 col-md-5 col-lg-5">
                                                        <label class="text-light-blue">Calle secundaria</label>
                                                        <input type="text" class="form-control input-sm" id="txtCalleSecundaria" name="txtCalleSecundaria" maxlength="50"/>
                                                    </div>
                                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                                        <label class="text-light-blue">Referencia</label>
                                                        <input type="text" class="form-control input-sm" id="txtReferencia" name="txtReferencia" maxlength="250"/>
                                                    </div>
                                                    <div class="col-xs-3 col-md-3 col-lg-3">
                                                        <label class="text-light-blue">Forma de pago</label>
                                                        <select id="txtFormaPago" name="txtFormaPago" class="form-control">
                                                            <option value=""></option>
                                                            <option>Efectivo</option>
                                                            <option>Transferencia bancaria</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-3 col-md-3 col-lg-3">
                                                        <label class="text-light-blue">TipoFacturación</label>
                                                        <select id="txtTipoFacturacion" name="txtTipoFacturacion" class="form-control">
                                                            <option value=""></option>
                                                            <option>Los mismos datos</option>
                                                            <option>Consumidor final</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-3 col-md-3 col-lg-3">
                                                        <label class="text-light-blue">Estado del pedido</label>
                                                        <select id="txtEstadoPedido" name="txtEstadoPedido" class="form-control">
                                                            <option value="P">PENDIENTE</option>
                                                            <option value="F">FINALIZADO</option>
                                                            <option value="C">CANCELADO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div><br></div>
                                                <div class="col-xs-12 col-md-12 col-lg-12 text-center">
                                                    <button class="btn btn-success btn-sm" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar Gestión</button>
                                                    <button class="btn btn-danger btn-sm" onclick="cancelar_formulario()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar Gestión</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
<script src="scripts/pedido.js" type="text/javascript"></script>