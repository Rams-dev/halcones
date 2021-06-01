<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= base_url()?>assets/css/css.css">
<link rel="shortcut icon" href="<?= base_url('assets/img/logo.jpg')?>" type="image/x-icon" />

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cultura y deportes UTVCO</title>
</head>
<body>
<div class="container mt-3">
<div class="image">
			<img src="<?=base_url('assets/img/logo1.jpg')?>" alt="logo">
			<span></span>
		</div>
	
		<div class="row justify-content-lg-end">
			<div class="col-lg-6 col-md-6 col-sm-12">
					<h1 class="text-center ">Registro de tutorías</h1><br>
					<form action="<?=base_url("login/validate")?>" id="form_login" method="POST" class="form-group col-lg-8 col-sm-12 mx-auto p-5 bg-white text-dark rounded" >
					
					  <div class="form-group ">
					  	<h3 class="text-center">Login</h3>
					  	</div>
					  	<div class="form-group" id="matricula">
					  	<label for="exampleInputEmail1"></i>Matrícula</label>
					    <input type="text" name="matricula" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						 <div class="invalid-feedback" id="error">
					    </div>
					  </div>
					  <div class="form-group" id="password">
					    <label for="exampleInputPassword1">Contraseña</label>
  							<input type="password" name="password" class="form-control" id="exampleInputPassword1">
					  <div class="invalid-feedback">
					    	</div>
					    </div>

					    <div class="d-flex justify-content-between">
					  		<button type="submit" class="btn btn-success btn-block">Login</button><br>
					  		<a href="<?=base_url('login/registro')?>" class="btn btn-outline-secondary btn-block ">Registrarse</a><br>
						<!-- <span> ¿Aún no tienes cuenta? <a class="btn btn-dark btn-sm" href="<?=base_url('login/registro')?>"> Registrate aquí</a></span> -->
						</div>
						<div id="alert">
							
						</div>
					</form> 

			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="<?=base_url('assets/js/auth/login.js')?>"></script>
<script src="<?=base_url('assets/js/auth/mask.js')?>"></script>
    
</body>
</html>