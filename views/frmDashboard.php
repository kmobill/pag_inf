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
                            <div class="col-xl-12 col-md-12 col-lg-12"><h3>Dashboard</h3></div>
                            <!-- [ Morris Chart ] start -->
                            <div class="col-xl-6 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Dashboard on real time</h5>
                                    </div>
                                    <div class="card-block">
                                        <div id="morris-donut-chart" style="height:300px"></div>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="col-xl-6 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Annual history</h5>
                                    </div>
                                    <div class="card-block">
                                        <div id="morris-bar-chart" style="height:300px"></div>
                                    </div>
                                </div>
                            </div>-->
                            <div class="col-xl-6 col-xl-6 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Atributos</h5>
                                    </div>
                                    <div class="card-block">
                                        <div id="line-chart" style="min-width: 320px; height: 400px; margin: 0 auto"></div>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Atributos</h5>
                                    </div>
                                    <div class="card-block">
                                        <div id="morris-line-smooth-chart" class="ChartShadow" style="height:300px"></div>
                                    </div>
                                </div>
                            </div>-->
<!--                            <div class="text-center">
                                <div class="btn-group" role="group" aria-label="">
                                    <button id="btnColumnas" type="button" class="btn btn-secondary">Columnas</button>
                                    <button id="btnLineas" type="button" class="btn btn-primary">Líneas</button>            
                                    <button id="btnTorta" type="button" class="btn btn-dark">Torta</button>
                                    <button id="btnPrueba" type="button" class="btn btn-danger">Gráfico de Prueba</button>            
                                    <button id="btnBD" type="button" class="btn btn-info">Gráficos desde BD</button>
                                </div>
                            </div>-->
                            

                            <!--                            <div class="col-xl-6 col-md-6 col-lg-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5>Bar [ Stacked ] Chart</h5>
                                                                </div>
                                                                <div class="card-block">
                                                                    <div id="morris-bar-stacked-chart" style="height:300px"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5>Line [ Angle ] Chart</h5>
                                                                </div>
                                                                <div class="card-block">
                                                                    <div id="morris-area-chart" style="height:300px"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5>Area [ Smooth ] Chart</h5>
                                                                </div>
                                                                <div class="card-block">
                                                                    <div id="morris-area-curved-chart" style="height:300px"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5>Line [ Angle ] Chart</h5>
                                                                </div>
                                                                <div class="card-block">
                                                                    <div id="morris-line-chart" class="ChartShadow" style="height:300px"></div>
                                                                </div>
                                                            </div>
                                                        </div>-->
                            <!-- [ Morris Chart ] end -->
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
<script src="scripts/custom-chart.js"></script>