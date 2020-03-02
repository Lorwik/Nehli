<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shortcut icon" href="nhicon.ico"/>
	
	<?php
		include('includes/config.php'); //Incluimos el archivo de configuración que contiene todas las constantes
		include('includes/funciones.php'); //Incluimos el archivo con todas las funciones
		include('index.php'); //Archivo de gestion de sesiones
		echo getBrowser(); //Comprobamos que el navegador que esta utilizando es compatible

		//¿Intenta acceder sin estar logeado?
		if(isset($_SESSION['user']) == false){
			header("refresh:0; url=index.php");
		}

		$UserName = $user->getUserName();
		$controlparental = $user->userParental($UserName);
		$useradmin = $user->userAdmin($UserName);
	?>

	<title><?php echo $titulo.' - '.$pagina; ?></title>
	<div class="menu-header">
		<a href="home.php"><img src="img/logo.png" class="logo" width="150"></a>
		<?php include('barramenu.php')?>
	</div>

</head>
	