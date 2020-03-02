<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<?php include("header.php"); ?>
		<script src="js/funciones.js"></script>
	</head>

	<body>
		<center>
			<div class="listado">
				<h1>Editar perfil de <?php echo $UserName; ?></h1>

				<div class="contentseparador">
					<form action="" method="POST">
				        <h2>Control Parental</h2>
				        Email:<br/>
				        <input type="email" name="email" class="campotexto" <?php echo 'value='.$user->getEmail();?> disabled><br/><br/>

				        <?php
				        	//¿Tiene el control parental activado?
				        	if ($controlparental){
				        		$check = "checked"; //Ponemos el checkbox marcado
				        	}else{
				        		$check = "uncheked"; //Ponemos el checkbox desmarcado
				        	}
				        ?>
				        <input type="checkbox" class="check" name="parental" value="parental" <?php echo $check ?>>
				        Activar control parental
				        <br/><br/>
				        <p class="center"><input type="submit" class="boton" name="guardarparental" value="Guardar cambios"></p><br/>
				    </form>

					<?php
				    	if (isset($_POST["guardarparental"])){
				    		$checkparental = 0; //iniciamos la variable por defecto desactivada
				    		if(isset($_POST['parental'])){ //Si el check de parental esta marcado...
							    $checkparental = 1;
							}
				    		if ($user->userChangeParental($UserName, $checkparental)){
				    			echo "Cambios guardados.";
				    		}else{
				    			echo "Error al guardar los cambios, intentalo mas tarde o ponte en contacto con un administrador.";
				    		}
						}
					?>
				</div>

				<br/>

				<div class="contentseparador">
					<form action="" method="POST">
				        <h2>Cambiar contraseña</h2>
				        <p>Password: <br>
				        <input type="password" name="password" class="campotexto"></p><br/>
				        <p>Repetir Password: <br>
				        <input type="password" name="repassword" class="campotexto"></p><br/>
				        <p class="center"><input type="submit" class="boton" value="Cambiar"></p><br/>
				    </form>

				<?php
    				if (isset($_POST["password"])){
    					$passForm = $_POST['password'];
						$repassForm = $_POST['repassword'];

						//Iniciamos la bandera error
						$error = false;

						//¿Se dejo algun campo vacio?
						if ($passForm == ""){
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

						//¿El usuario existe? (solo por seguridad)
						if ($user->ExisteUsuario($UserName) == false){
							$errormsg = "El usuario no existe";
							$error = true;
						}

						//¿Se produjo algun error?
						if ($error == false){
							//Si llegamos aqui, creamos el usuario
							if ($user->userChangePass($UserName, $passForm)){
								echo "La contraseña fue cambiada con exito.";
							}else{
								echo "Error al cambiar la contraseña, intentalo mas tarde o ponte en contacto con un administrador.";
							}
						}else{ //Si se produjeron, mostamos cuales fueron.
							echo $errormsg;
							$error = false;
						}
    				}
    			?>
				</div>
			</div>
		</center>
	</body>
</html>