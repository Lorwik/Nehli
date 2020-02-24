<<<<<<< HEAD
<ul class="menu-superior">
	<li><a href="index.php">Inicio</a></li>
	<li><a href="">Música</a></li>
	<li><a href="youtube.php">YouTube</a></li>
</ul>


<h1>Bienvenido <?php echo $user->getNombre();  ?></h1>
<li class="cerrar-sesion"><a href="includes/logout.php">Cerrar sesión</a></li>
=======
<ul class="menu-superior">
	<li><a href="index.php">Inicio</a></li>
	<li><a href="">Música</a></li>
	<li><a href="youtube.php">YouTube</a></li>
</ul>

<ul id="menu-superiorright" class="menu-superior">
	<li>Bienvenido <?php echo $user->getUserName(); ?></li>
	<li><a href="includes/logout.php">Cerrar sesión</a></li>
	<li><img class="avatar" src="img/avatar.png"></li>
</ul>
>>>>>>> registro
