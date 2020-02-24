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

					//¿Se dejo algun campo vacio?
					if (($userForm == "") || ($passForm == "") || ($emailForm == "")){
						echo "¡Debes rellenar todos los campos!";
					}else{
						//¿Coinciden las contraseñas?
						if ($passForm == $repassForm){
							include("includes/user.php");
							$user = new user();
							//¿El usuario ya existe?
							if ($user->ExisteUsuario($userForm) == false) {
								if ($user->ExisteEmail($emailForm) == false) {
									if ($user->createUser($userForm, $passForm, $emailForm)){
										header("refresh:3; url=index.php");
										echo "¡Registro completado! Redireccionando en 3...";
									}else{
										echo "Error al registrar la cuenta, intentalo mas tarde o ponte en contacto con un administrador.";
									}
								}else{
									echo "Ya hay una cuenta con ese email registrado.";
								}
							}else{
								echo "Ya hay un usuario registrado con ese nombre.";
							}
						}else{
							echo "Las contraseñas no coinciden";
						}
					}
				}
			?>

	    </div>
	    </center>
	</body>
</html>