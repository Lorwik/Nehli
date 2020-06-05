<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/estilos-login.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

		<link rel="shortcut icon" href="nhicon.ico"/>
		<?php include("includes/config.php");?>
		<title><?php echo $titulo; ?> - Registro</title>
	</head>
	<body>
		<a href="index.php"><img src="img/logo.png" class="logo" width="150"></a>

		<div class="container">

		    <form action="" method="POST" accept-charset="utf-8" class="form-horizontal" role="form">
		       	<div class="titulo text-center">
					<h1 class="regBoxTitle">Registro de Cuenta</h1>
				</div>

		        <div class="form-group">
					<label for="username" class="col-sm-6 col-form-label">Nombre de usuario: </label>
					<div class="col-sm">
						<input type="text" name="username" class="form-control" autofocus>
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="col-sm-2 col-form-label">Contrase&ntilde;a: </label>
					<div class="col-sm">
						<input type="password" name="password" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="repassword" class="col-sm-6 col-form-label">Repetir Contrase&ntilde;a: </label>
					<div class="col-sm">
						<input type="password" name="repassword" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-sm-2 col-form-label">Email: </label>
					<div class="col-sm">
						<input type="email" name="email" class="form-control">
					</div>
				</div>

				<br/>
				<div class="text-center">
		        	<p class="center"><input type="submit" class="btn btn-danger btn-lg" value="Registrar"></p>
		        </div>

		        <?php require("includes/process/register.php"); ?>
		    </form>
	    </div>
	</body>
</html>