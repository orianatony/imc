<?php
session_start();
?>
<!doctype html>
<html lang="es  ">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/toastr.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Login</title>
</head>
<body class="bg">
<?php include('navbar.php');?>
<div class="container-fluid">
    <div class="row mt-5" >
        <div class="col-lg-6 offset-lg-3">
            <div id="card" class="card shadow p-3 mb-3 rounded">
                <div class="card-header">
                    Acciones
                </div>
                <div class="card-body text-center col-lg-6 offset-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-10 offset-lg-1">
                                <a type="button" class="btn btn-primary btn-block mt-3" href="imc_form.php">Calcule su IMC</a>
                                <a type="button" class="btn btn-primary btn-block mt-4" href="tmb_form.php">Calcule su TMB</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/toastr.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
