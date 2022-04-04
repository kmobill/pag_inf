<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Análisis de Datos</title>
        <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 10]>
                    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                    <![endif]-->
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
        <meta name="author" content="Kimobill - Developer Mónica Viera"/>

        <!-- Favicon icon -->
        <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
        <!-- fontawesome icon -->
        <link rel="stylesheet" href="../assets/fonts/fontawesome/css/fontawesome-all.min.css">
        <!-- animation css -->
        <link rel="stylesheet" href="../assets/plugins/animation/css/animate.min.css">
        <!-- vendor css -->
        <link rel="stylesheet" href="../assets/css/style.css">

    </head>

    <body>
        <div class="auth-wrapper">
            <div class="auth-content">
                <div class="auth-bg">
                    <span class="r"></span>
                    <span class="r s"></span>
                    <span class="r s"></span>
                    <span class="r"></span>
                </div>
                <div class="card">
                    <form action="../ajax/loginC.php" name="login" id="login" method="post">
                        <div class="card-body text-center">
                            <div class="mb-4">
                                <i class="feather icon-unlock auth-icon"></i>
                            </div>
                            <h3 class="mb-4">Inicio de sesión</h3>
                            <div class="input-group mb-3">
                                <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" placeholder="Usuario">
                            </div>
                            <div class="input-group mb-4">
                                <input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Contraseña">
                            </div>
                            <button type="submit" class="btn btn-primary shadow-2 mb-4">Iniciar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Required Js -->
        <script src="../assets/js/vendor-all.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>
