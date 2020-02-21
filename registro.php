<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/estilos-login.css">
		<link rel="shortcut icon" href="nhicon.ico"/>
		<?php include("includes/config.php")?>
		<title><?php echo $titulo; ?> - Registro</title>
	</head>
	<body>
		<a href="index.php"><img src="img/logo.png" class="logo" width="150"></a>

		<center>
		<div class="loginregistro">
		    <form action="" method="POST">
		        <?php
		            if(isset($errorLogin)){
		                echo $errorLogin;
		            }
		        ?>
		        <h2>Registrar</h2>
		        <p>Nombre de usuario: <br>
		        <input type="text" name="username" class="txtlogin"></p>
		        <p>Password: <br>
		        <input type="password" name="password" class="txtlogin"></p>
		        <p>Repetir Password: <br>
		        <input type="repassword" name="repassword" class="txtlogin"></p>
		        <p>Email: <br>
		        <input type="email" name="email" class="txtlogin"></p>
		        <p class="center"><input type="submit" class="btnlogin" value="Registrar"></p>
		    </form>
	    </div>
	    </center>
	</body>
</html>