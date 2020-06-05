<?php
	include("includes/user.php");

    if (!empty($_POST) && isset($_POST["email"]) && 
		isset($_POST["password"]) && 
		isset($_POST["repassword"]) &&
		isset( $_POST['email'])) {

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
			if (!$user->createUser($userForm, $passForm, $emailForm)){
				echo '<div class="alert alert-danger" role="alert">';
				echo "Ha ocurrido un error al formar la petición al servidor. Intente nuevamente!.";
				echo '</div>';
			}
		}else{ //Si se produjeron, mostamos cuales fueron.
			echo '<div class="alert alert-warning" role="alert">';
			echo $errormsg;
			echo '</div>';
			$error = false;
		}
	}
?>