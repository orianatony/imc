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
    <title>Login</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">IMC_TMB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Datos IMC</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Datos TMB</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="logout" href="#">Cerrar sesion</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">

    <p>Bienvenido <?php echo $_SESSION['name'];?></p>

</div>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/toastr.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
