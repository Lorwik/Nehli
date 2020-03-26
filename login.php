<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/estilos-login.css">
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
		<center>
		<div class="loginregistro">
		    <form action="" method="POST">
		    	<!--Si ya intento logear pero hubo un error lo mostramos -->
		        <?php
		            if(isset($errorLogin)){
		                echo $errorLogin;
		            }
		        ?>
		        
		        <h2>Iniciar sesión</h2>
		        <p>Nombre de usuario: <br>
		        <input type="text" name="username" class="txtlogin"></p>
		        <p>Password: <br>
		        <input type="password" name="password" class="txtlogin"></p>
		        <p class="center"><input type="submit" class="btnlogin" value="Iniciar Sesión"></p>
		    </form>
		    ¿Nuevo en Nehli?  <a href="registro.php">¡Registrate!</a>
	    </div>
	    </center>
	</body>
</html>