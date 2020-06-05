<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/estilos-login.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

		<link rel="shortcut icon" href="nhicon.ico"/>
		<?php
			include("includes/config.php");
			include('index.php'); //Archivo de gestion de sesiones
		?>
		<title><?php echo $titulo; ?> - Login</title>
	</head>
	<body>
		<a href="index.php"><img src="img/logo.png" class="logo" width="150"></a>
		<?php
			//¿Ya esta logeado?
			if (isset($_SESSION['user'])) {
				header("refresh:0; url=home.php");
			}
		?>

		<div class="container">
		    <form action="" method="POST" accept-charset="utf-8" class="form-horizontal" role="form">  
		        <div class="titulo text-center">
					<h1 class="regBoxTitle">Iniciar sesión</h1>
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

				<br/>
				<div class="text-center">
		        	<input type="submit" class="btn btn-danger btn-lg" value="Iniciar Sesión">
		        </div>

		        <br/>
		        <p class="text-center">¿Nuevo en Nehli?  <a href="registro.php">¡Registrate!</a></p>

		        <!--Si ya intento logear pero hubo un error lo mostramos -->
		        <?php
		            if(isset($errorLogin)){
		                echo $errorLogin;
		            }
		        ?>
		    </form>
	    </div>
	</body>
</html>