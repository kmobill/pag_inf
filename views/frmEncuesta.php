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
                                <h3>Encuesta</h3>
                                <div id="home" class="container"><br>
                                    <form name="formulario" id="formulario" method="POST" class="">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center"><b class="text-center">BLOQUE A - Datos del cliente</b></div>
                                        <div class="row col-xs-12 col-md-12 col-lg-12">

                                            <div class="col-xs-3 col-md-3 col-lg-3">
                                                <label class="text-light-blue">Identificación del cliente</label>
                                                <input onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtIdentificacion" name="txtIdentificacion"  maxlength="10" required/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <label class="text-light-blue">Nombre del cliente</label>
                                                <input type="text" class="form-control input-sm" id="txtNombreCliente" name="txtNombreCliente" required/>
                                            </div>
                                            <div class="col-xs-3 col-md-3 col-lg-3">
                                                <label class="text-light-blue">Ciudad del cliente</label>
                                                <input type="text" class="form-control input-sm" id="txtCiudadCliente" name="txtCiudadCliente" required/>
                                            </div>
                                            <div class="col-xs-3 col-md-3 col-lg-3">
                                                <label class="text-light-blue">Celular del cliente</label>
                                                <input pattern="^09(\d{8})$" onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtCelular" name="txtCelular" maxlength="10" required/>
                                            </div>
                                            <div class="col-xs-3 col-md-3 col-lg-3">
                                                <label class="text-light-blue">Teléfono convencional del cliente</label>
                                                <input pattern="^(0[2-7])(\d{7})$" onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtConvencional" name="txtConvencional" maxlength="9"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <label class="text-light-blue">Correo del cliente</label>
                                                <input pattern="[a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*@[a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{1,5}" id="txtCorreo" name="txtCorreo" type="text" class="form-control">
                                            </div>
                                        </div>


                                        <div id="pnlEncuestaOscus">
                                            <!---------------------------------------------------------Medición Oscus---------------------------------------------------->
                                            <div class="col-xs-12 col-md-12 col-lg-12 text-center"><br><b class="text-center">Indicadores de experiencia</b></div>
                                            <div class="row col-xs-12 col-md-12 text-center"><label class="text-light-blue">En la escala de 1 a 10 donde 1 es poco satisfecho y 10 muy satisfecho:</label></div>                                            
                                            <div class="row">
                                                <div class="col-xs-9 col-md-9 col-lg-9"><input id="pregunta1" name="pregunta1" class="text-bold form-control text-light-blue" value="1.  Su grado de satisfacción con el servicio recibido de manera general en la Institución" readonly/></div>
                                                <div class="col-xs-3 col-md-3 col-lg-3">
                                                    <select id="respuesta1" name="respuesta1" class="form-control">
                                                        <option value=""></option>
                                                        <option >1</option>
                                                        <option >2</option>
                                                        <option >3</option>
                                                        <option >4</option>
                                                        <option >5</option>
                                                        <option >6</option>
                                                        <option >7</option>
                                                        <option >8</option>
                                                        <option >9</option>
                                                        <option >10</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6 col-md-6 col-lg-6"><input id="pregunta2" name="pregunta2" class="text-bold form-control text-light-blue" value="¿Por qué seleccionó esa alternativa?" readonly/></div>
                                                <div class="col-xs-6 col-md-6 col-lg-6">
                                                    <div class="divTableCell">
                                                        <input type="text" class="form-control input-sm" id="respuesta2" name="respuesta2"/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-9 col-md-9 col-lg-9"><textarea id="pregunta3" name="pregunta3" class="text-bold form-control text-light-blue" readonly>2. En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría ¿en qué grado recomendaría a la Institución a un familiar, amigo o colega de trabajo?</textarea></div>
                                                <div class="col-xs-3 col-md-3 col-lg-3">
                                                    <select id="respuesta3" name="respuesta3" class="form-control" required>
                                                        <option value=""></option>
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6 col-md-6 col-lg-6"><input id="pregunta4" name="pregunta4" class="text-bold form-control text-light-blue" readonly/></div>
                                                <div class="col-xs-6 col-md-6 col-lg-6">
                                                    <input type="text" class="form-control input-sm" id="respuesta4" name="respuesta4"/>
                                                </div>
                                                <div class="col-xs-9 col-md-9 col-lg-9"><textarea id="pregunta5" name="pregunta5" class="text-bold form-control text-light-blue" readonly>3. ¿Qué tan fácil o sencillo es para usted gestionar sus requerimientos en la Institución?</textarea></div>
                                                <div class="col-xs-3 col-md-3 col-lg-3">
                                                    <select id="respuesta5" name="respuesta5" class="form-control" required>
                                                        <option value=""></option>
                                                        <option>Muy Fácil</option>
                                                        <option>Fácil</option>
                                                        <option>Poco fácil</option>
                                                        <option>Difícil</option>
                                                        <option>Muy difícil</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6 col-md-6 col-lg-6"><input id="pregunta6" name="pregunta6" class="text-bold form-control text-light-blue" value="¿Por qué seleccionó esa alternativa?" readonly/></div>
                                                <div class="col-xs-6 col-md-6 col-lg-6">
                                                    <div class="divTableCell">
                                                        <input type="text" class="form-control input-sm" id="respuesta6" name="respuesta6"/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-9 col-md-9 col-lg-9"><textarea id="pregunta9" name="pregunta9" class="text-bold form-control text-light-blue" readonly>4. Califique del 1 al 7 siendo 1 malo y 7 excelente: como califica las medidas sanitarias aplicadas por la cooperativa en su visita a la Agencia</textarea></div>
                                                <div class="col-xs-3 col-md-3 col-lg-3">
                                                    <select id="respuesta9" name="respuesta9" class="form-control" required>
                                                        <option value=""></option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6 col-md-6 col-lg-6"><input id="pregunta10" name="pregunta10" class="text-bold form-control text-light-blue" value="¿Por qué seleccionó esa alternativa?" readonly/></div>
                                                <div class="col-xs-6 col-md-6 col-lg-6">
                                                    <input type="text" class="form-control input-sm" id="respuesta10" name="respuesta10"/>
                                                </div>


                                                <div class="col-xs-12 col-md-12 col-lg-12 text-center"><br><b class="text-center">Indicadores CHURN INDICATOR</b></div>                    

                                                <div class="col-xs-9 col-md-9 col-lg-9"><textarea id="pregunta7" name="pregunta7" class="text-bold form-control text-light-blue" readonly>5. Si su experiencia con la cooperativa se mantiene igual a la que ha tenido hasta ahora, consideraría seguir con nosotros, ¿por cuánto tiempo más?</textarea></div>
                                                <div class="col-xs-3 col-md-3 col-lg-3">
                                                    <select id="respuesta7" name="respuesta7" class="form-control" required>
                                                        <option value=""></option>
                                                        <option>De 3 a 5 años</option>
                                                        <option>De 1 a 3 años</option>
                                                        <option>Hasta 1 año</option>
                                                        <option>No quiero seguir</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6 col-md-6 col-lg-6"><input id="pregunta8" name="pregunta8" class="text-bold form-control text-light-blue" value="¿Por qué seleccionó esa alternativa?" readonly/></div>
                                                <div class="col-xs-6 col-md-6 col-lg-6">
                                                    <input type="text" class="form-control input-sm" id="respuesta8" name="respuesta8"/>
                                                </div>
                                            </div>
                                            <div><br></div>
                                            <div class="col-xs-12 col-md-12 col-lg-12 text-center">
                                                <button class="btn btn-info" id="btnNuevaGestion" type="button" value="Nueva Gestión" onclick="nuevaGestion()"><i class="fa fa-rotate-left"></i> Nueva Gestión</button>
                                                <button class="btn btn-success btn-sm" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar Gestión</button>
                                                <button class="btn btn-danger btn-sm" onclick="cancelar_formulario()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar Gestión</button>
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
<script src="scripts/encuesta.js" type="text/javascript"></script>