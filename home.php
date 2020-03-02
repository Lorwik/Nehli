<html>
	<head>
		<meta charset="utf-8">
		<?php
			$pagina = " Inicio";
			include("header.php");
		?>
		<script src="js/funciones.js"></script>
	</head>
	
	<body>
		<div class="listado">
			<div class="row">
			    <div class="row__inner">
					<?php
					for ($x = 0; $x < sizeof($categoria); $x++){
						//¿Tiene el control parental activado?
						if ($x == (sizeof($categoria)-1) && $controlparental == true){
							//Si tiene el control parental activado no mostramos el ultimo elemento del array
						}else{	
							echo "<h1>".$categoria[$x]."</h1>";
							obtenerListadoDeCarpetas($video_dir.$categoria[$x]."/", $carpetas);
							for ($i = 0; $i < sizeof($carpetas); $i++){

								//¿El video tiene su propia miniatura?
					            $miniatura = obtenerMiniatura($carpetas[$i]);

					            if ($miniatura == ""){
					              $miniatura = "img/miniatura_default.png";
					            }

					            //Vamos imprimiendo cada video en sus listas
					            echo "<div class='tile'>";
				        			echo "<div class='tile__media'>";
							            echo "<div class='contenedor'>";
								            echo "<img title='".$carpetas[$i]."' src='".$miniatura."' id=miniatura alt='".$carpetas[$i]."'></a> ";
								            echo "<div class='tile__details' onclick='mostrar(".($x+1).$i.");'>";
								            	echo "<div class='tile__title'>";
								            		echo "<h2>".substr($carpetas[$i], 19, 40)."</h2>";
								            	echo "</div>";
								            echo "</div>";
								        echo "</div>";
						            echo "</div>";
					            echo "</div>";

					            echo "<div id='mostrarOcultar".($x+1).$i."' class='mostrarocultar' style='display: none;'>";
									//Obtenemos el listado de videos del directorio
									obtenerListadoDeVideos($carpetas[$i], $videos);
									for ($j = 0; $j < sizeof($videos); $j++){
										echo "<div class='subcontenedor'>";
											echo "<a href='reproductor.php?dir=".$i."&category=".$x."&id=".$j."' method='post'><img title='".$videos[$j]."' src='".$miniatura."' id=miniatura alt='".$videos[$j]."'></a>";
											echo "<div class='texto-encima'><a>".substr($videos[$j], 0, 30)."...</a></div>";
										echo "</div>";
									}
								echo "</div>";

								//Destruimos la variable, de lo contrario el contenido actual se sumara al siguiente
								unset($videos);

							}
							//Vaciamos los arrays
							unset($carpetas);
						}
					}
					?>
			    </div>
  			</div>
		</div>
	</body>
</html>