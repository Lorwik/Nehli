<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/estilos-login.css">
		<link rel="shortcut icon" href="nhicon.ico"/>
		<title><?php echo $titulo; ?></title>
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