<?php
session_start();

?>
<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/toastr.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Formulario TMB</title>
  </head>
  <body class="bg">
  <?php include('navbar.php');?>
    <div class="container-fluid">
    	<div class="row mt-5" >
    		<div class="col-lg-6 offset-lg-3">
    			<div id="card" class="card shadow p-3 mb-3 rounded">
  					<img id="bg" class="card-img-top" src="img/bg.jpg" alt="back_ground">					
  					<div class="card-body mt-5">
  						<form action="php/calcularIMC.php" method="POST" class="col-lg-12">
	  						<div class="row col-lg-12 text-center mt-3">
	  							<h1 class="col-lg-12">Formulario TMB.</h1>
	  						</div>	  						
	  						<div class="row col-lg-12">
	  							<div class="form-group col-lg-12 mt-2">
		  							<label for="peso">Peso (kg):</label>
		  							<input type="text" class="form-control" id="peso" name="peso">								
		  						</div>
	  						</div>
	  						<div class="row col-lg-12">
	  							<div class="form-group col-lg-12 mt-2">
		  							<label for="estatura">Estatura (m):</label>
		  							<input type="text" class="form-control" id="estatura" name="estatura">								
		  						</div>
	  						</div>
                            <div class="row col-lg-12">
                                <div class="form-group col-lg-12 mt-2">
                                    <label for="edad">Edad (años):</label>
                                    <input type="text" class="form-control" id="edad" name="edad">
                                </div>
                            </div>
                            <div class="row col-lg-12">
                                <div class="form-group col-lg-12 mt-2">
                                    <label for="nivel_actividad">Nivel Actividad:</label>
                                    <select type="text" class="form-control" id="nivel_actividad" name="nivel_actividad">
                                        <option value="0">Seleccione...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row col-lg-12">
                                <div class="form-group col-lg-12 mt-2">
                                    <label for="sexo">Sexo:</label>
                                    <select type="text" class="form-control" id="sexo" name="sexo">
                                        <option value="0">Seleccione...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row col-lg-12 mt-2">
	  							<button id="clean" type="submit" class="btn pull-left col-lg-4 p-3 text-uppercase font-weight-bold shadow-lg p-3 mb-3 rounded">Limpiar</button>
	  							<button id="send" type="submit" class="btn pull-left col-lg-4 offset-lg-4 text-uppercase font-weight-bold shadow-lg p-3 mb-3 rounded" >Enviar</button>
	  						</div>
  						</form>
  					</div>
				</div>
    		</div>
    	</div>
    </div>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/toastr.min.js"></script>
    <script src="js/tmb_form.js"></script>
  </body>
</html>