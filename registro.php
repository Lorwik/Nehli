<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/estilos-login.css">
		<link rel="shortcut icon" href="nhicon.ico"/>
		<?php include("includes/config.php");?>
		<title><?php echo $titulo; ?> - Registro</title>
	</head>
	<body>
		<a href="index.php"><img src="img/logo.png" class="logo" width="150"></a>

		<center>
		<div class="loginregistro">
		    <form action="" method="POST">
		        <h2>Registrar</h2>
		        <p>Nombre de usuario: <br>
		        <input type="text" name="username" class="txtlogin"></p>
		        <p>Password: <br>
		        <input type="password" name="password" class="txtlogin"></p>
		        <p>Repetir Password: <br>
		        <input type="password" name="repassword" class="txtlogin"></p>
		        <p>Email: <br>
		        <input type="email" name="email" class="txtlogin"></p>
		        <p class="center"><input type="submit" class="btnlogin" value="Registrar"></p>
		    </form>

			<?php
    			if (isset($_POST["username"])){
					$userForm = $_POST['username'];
					$passForm = $_POST['password'];
					$repassForm = $_POST['repassword'];
					$emailForm = $_POST['email'];

					//Iniciamos la bandera error
					$error = false;

					//¿Se dejo algun campo vacio?
					if (($userForm == "") || ($passForm == "") || ($emailForm == "")){
						$errormsg = "¡Debes rellenar todos los campos!";
						$error = true;
					}

					//¿Coinciden las contraseñas?
					if ($passForm <> $repassForm){
						$errormsg = "Las contraseñas no coinciden";
						$error = true;
					}

					//¿Las contraseñas cumplen un minimo de caracteres?
					if ((strlen($passForm) < 6) || (strlen($passForm) > 20)){
						$errormsg = "La contraseña debe tener entre 6 a 20 caracteres.";
						$error = true;
					}

					include("includes/user.php");
					$user = new user();
					//¿El usuario ya existe?
					if ($user->ExisteUsuario($userForm) == true){
						$errormsg = "Ya hay un usuario registrado con ese nombre.";
						$error = true;
					}

					//¿El usuario ya fue registrado?
					if ($user->ExisteEmail($emailForm) == true){
						$errormsg = "Ya hay una cuenta con ese email registrado.";
						$error = true;
					}

					//¿Se produjo algun error?
					if ($error == false){
						//Si llegamos aqui, creamos el usuario
						if ($user->createUser($userForm, $passForm, $emailForm)){
							echo "¡Registro completado! Redireccionando en 3...";
							header("refresh:3; url=index.php");
						}else{
							echo "Error al registrar la cuenta, intentalo mas tarde o ponte en contacto con un administrador.";
						}
					}else{ //Si se produjeron, mostamos cuales fueron.
						echo $errormsg;
						$error = false;
					}
				}
			?>

	    </div>
	    </center>
	</body>
</html>