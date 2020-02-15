<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/estilos-login.css">
		<link rel="shortcut icon" href="nhicon.ico"/>
		<?php
			include('config.php'); //Incluimos el archivo de configuración que contiene todas las constantes
			include('funciones.php'); //Incluimos el archivo con todas las funciones
			echo getBrowser(); //Comprobamos que el navegador que esta utilizando es compatible
		?>

		<title><?php echo $titulo; ?></title>
	</head>
	<body>
		<img src="img/logo.png" class="logo">
		<center>
		<div class="loginregistro">
			<h1>Iniciar sesión</h1>
			<br/>
			Suscríbete para empezar a disfrutar o reactiva tu suscripción.
			<form action="login.php" method="post" class="frmlogin">
				Nombre de usuario: <br/>
				<input name="usuario" id="txtuser" class= "txtlogin" type="text" value="" size="8" />
				<br/><br/>
				Contraseña: <br/>
				<input name="password" id="txtpass" class= "txtlogin" type="text" value="" size="8" />
				<br/><br/><br/>
				<input name="submit" id="btnlogin" class= "btnlogin" type="submit" value="Iniciar sesión" size="8" />
				<br/>
				<input name="submit" id="btnlogin" class= "btnlogin" type="submit" value="Volver" size="8" />
			</form>
			<br/><br/>
			¿Todavía sin Nehli? <a href="registro.php">¡Registrate ya!</a>
		</div>
		</center>
	</body>
</html>