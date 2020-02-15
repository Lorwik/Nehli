<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shortcut icon" href="nhicon.ico"/>
	
	<?php
		include('config.php'); //Incluimos el archivo de configuración que contiene todas las constantes
		include('funciones.php'); //Incluimos el archivo con todas las funciones
		echo getBrowser(); //Comprobamos que el navegador que esta utilizando es compatible
	?>

	<title><?php echo $titulo; ?></title>
	<div class="menu-header">
		<a href="index.php"><img src="img/logo.png" class="logo" width="150"></a>
		<?php include('barramenu.php')?>
	</div>

</head>
	