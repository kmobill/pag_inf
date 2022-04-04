<?php
session_start();
if ($_SESSION['usu_1'] == "") {
    session_unset($_SESSION['usu_1']);
    session_unset($_SESSION['name_1']);
    header('location: ../views/login.php');
}
?>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">CX-KMB</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Importación</label>
                </li>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                    <a href="../views/frmImportaciones.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Importación de datos</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Data & Estadística</label>
                </li>
                <li data-username="Dashboard" class="nav-item"><a href="../views/frmDashboard.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Dashboard</span></a></li>
                <li data-username="SpeechToText" class="nav-item"><a href="../views/frmSpeechToText.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-volume-1"></i></span><span class="pcoded-mtext">Speech to text</span></a></li>
                <li data-username="Encuesta" class="nav-item"><a href="../views/frmEncuesta.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-volume-1"></i></span><span class="pcoded-mtext">Encuesta</span></a></li>
                <li data-username="CrearPedido" class="nav-item"><a href="../views/frmCrearPedido.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-volume-1"></i></span><span class="pcoded-mtext">Crear Pedido</span></a></li>
                <li data-username="ReportePedidos" class="nav-item"><a href="../views/frmReportesPedidos.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-volume-1"></i></span><span class="pcoded-mtext">Reportes Pedido</span></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
        <a href="index.html" class="b-brand">
            <div class="b-bg">
                <i class="feather icon-trending-up"></i>
            </div>
            <span class="b-title">Análisis de Datos</span>
        </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="javascript:">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown">Dropdown</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:">Action</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <div class="main-search">
                    <div class="input-group">
                        <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                        <a href="javascript:" class="input-group-append search-close">
                            <i class="feather icon-x input-group-text"></i>
                        </a>
                        <span class="input-group-append search-btn btn btn-primary">
                            <i class="feather icon-search input-group-text"></i>
                        </span>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <!--<img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">-->
                            <span class="">
                                <?php echo $_SESSION['name_1']; ?>
                            </span>
                            <a href="../ajax/logoutC.php" class="dud-logout" title="Cerrar sesión">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="#" data-toggle="modal" data-target="#cambioPassModal" class="dropdown-item"><i class="feather icon-settings"></i> Cambio de contraseña</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- [ Header ] end -->

<div class="modal" id="cambioPassModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Cambio de contraseña</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="userId" name="userId" value="<?php echo $_SESSION['usu_1']; ?>" maxlength="80" required/>
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <label class="label-align" for="oldPassword">Ingrese contraseña actual <span class="required">*</span></label>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" maxlength="80" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <label class="label-align" for="newPassword">Ingrese nueva contraseña <span class="required">*</span></label>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <input type="password" class="form-control" id="newPassword" name="newPassword" maxlength="80" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <label class="label-align" for="newPassword2">Confirmar nueva contraseña <span class="required">*</span></label>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <input type="password" class="form-control" id="newPassword2" name="newPassword2" maxlength="80" required/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
                <button type="button" class="btn btn-dark" id="btnCancelar" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#cambioPassModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus');
    })
</script>
<script src="scripts/actualizarClave.js" type="text/javascript"></script>