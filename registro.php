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
			<h1>Registrar</h1>
			<br/>
			Comienza tu experiencia en Nehli
			<form action="registro.php" method="post" class="frmlogin">
				Nombre de usuario: <br/>
				<input name="usuario" id="txtuser" class= "txtlogin" type="text" value="" size="8" />
				<br/><br/>
				Contraseña: <br/>
				<input name="password" id="txtpass" class= "txtlogin" type="text" value="" size="8" />
				<br/><br/>
				Repetir contraseña: <br/>
				<input name="repassword" id="txtrepass" class= "txtlogin" type="text" value="" size="8" />
				<br/><br/>
				E-mail: <br/>
				<input name="email" id="txtemail" class= "txtlogin" type="text" value="" size="8" />
				<br/><br/>
				<input name="submit" id="btnlogin" class= "btnlogin" type="submit" value="Registrar" size="8" />
				<br/><br/>
				<input name="submit" id="btnlogin" class= "btnlogin" type="submit" value="Volver" size="8" />
			</form>
			<br/><br/><br/>
		</div>
		</center>
	</body>
</html>