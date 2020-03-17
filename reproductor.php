<?php
	//Si intenta entrar sin pasar la categoria y video, lo echamos
	if (isset($_GET['dir'])){
		$dir=$_GET['dir'];
		$cat=$_GET['category'];
		$id=$_GET['id'];
	} else {
		header("location:home.php");
	}
?>

<html>
	<head>
		<?php
			$pagina = " Reproductor";
			include("header.php");
		?>
		<link href="css/video-js.css" rel="stylesheet" />
		<link href="css/netflix-skin.css" rel="stylesheet" />
		<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
		<script src="js/video.js"></script>

		<?php
			//Si esta intentando acceder directamente a una categoria protegida por control parental lo echamos
			if ($cat == (sizeof($categoria)-1) && $controlparental == true){
				echo "No tienes permisos para estar aquí.";
				header("location:home.php");
			}
		?>
	</head>
	
	<br/><br/><br/>
	<body>
		<?php 
			//Obtenemos el listado de videos del directorio
			obtenerListadoDeCarpetas($video_dir.$categoria[$cat]."/", $carpetas);
			//Obtenemos el listado de videos del directorio
			obtenerListadoDeVideos($carpetas[$dir], $videos);
		?>
		<center>
			<br/>
			<!--Mostramos el titulo del video actual-->
			<h2><?php echo substr($videos[$id],0,-4) ?></h1>
			<br/>

			<!--REPRODUCTOR DE VIDEO-->
			<video id="my-video" class="video-js vjs-big-play-centered vjs-16-9" controls preload="auto" width="1280" heigh="768" poster="img/poster.png" codecs="theora, vorbis" data-setup='{}'>
				<?php
					//Comprobamos que tipo de extension es para configurar la fuente
					TipoDeFuente($videos[$id], $source);
					echo '<source src="'.$carpetas[$dir]."/".$videos[$id].'" type="'.$source.'" codecs="avc1.42E01E, mp4a.40.2"/>';

					$subtitulos = Buscarsubtitulos($carpetas[$dir], $videos[$id]);
					if ($subtitulos <> "NADA"){
						echo '<track kind="captions" src="'.$carpetas[$dir]."/".$subtitulos.'" srclang="es" label="Español" default>';
					}

				?>
				<p class="vjs-no-js">
				  Para ver este video, habilite JavaScript y considere actualizar a un navegador web que
				  <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
				</p>
			</video>

			<script>
			  var player = videojs('my-video', { 
			    html5: {
			      hls: {
			        overrideNative: true
			      }
			    }
			  });
			</script>

			<!--SCRIPT PARA LOS ACCESOS RAPIDO DEL TECLADO EN EL REPRODUCTOR -->
			<script src="js/videojs.hotkeys.js"></script>
		    <script>
		      // initialize the plugin
		      videojs('my-video').ready(function() {
		        this.hotkeys({
		          volumeStep: 0.1,
		          seekStep: 5,
		          enableMute: true,
		          enableFullscreen: true,
		          enableNumbers: false,
		          enableVolumeScroll: true,
		          enableHoverScroll: true,

		          // Mimic VLC seek behavior, and default to 5.
		          seekStep: function(e) {
		            if (e.ctrlKey && e.altKey) {
		              return 5*60;
		            } else if (e.ctrlKey) {
		              return 60;
		            } else if (e.altKey) {
		              return 10;
		            } else {
		              return 5;
		            }
		          },

		          // Enhance existing simple hotkey with a complex hotkey
		          fullscreenKey: function(e) {
		            // fullscreen with the F key or Ctrl+Enter
		            return ((e.which === 70) || (e.ctrlKey && e.which === 13));
		          },

		          // Custom Keys
		          customKeys: {

		            // Add new simple hotkey
		            simpleKey: {
		              key: function(e) {
		                // Toggle something with S Key
		                return (e.which === 83);
		              },
		              handler: function(player, options, e) {
		                // Example
		                if (player.paused()) {
		                  player.play();
		                } else {
		                  player.pause();
		                }
		              }
		            },

		            // Add new complex hotkey
		            complexKey: {
		              key: function(e) {
		                // Toggle something with CTRL + D Key
		                return (e.ctrlKey && e.which === 68);
		              },
		              handler: function(player, options, event) {
		                // Example
		                if (options.enableMute) {
		                  player.muted(!player.muted());
		                }
		              }
		            },

		            // Override number keys example from https://github.com/ctd1500/videojs-hotkeys/pull/36
		            numbersKey: {
		              key: function(event) {
		                // Override number keys
		                return ((event.which > 47 && event.which < 59) || (event.which > 95 && event.which < 106));
		              },
		              handler: function(player, options, event) {
		                // Do not handle if enableModifiersForNumbers set to false and keys are Ctrl, Cmd or Alt
		                if (options.enableModifiersForNumbers || !(event.metaKey || event.ctrlKey || event.altKey)) {
		                  var sub = 48;
		                  if (event.which > 95) {
		                    sub = 96;
		                  }
		                  var number = event.which - sub;
		                  player.currentTime(player.duration() * number * 0.1);
		                }
		              }
		            },

		            emptyHotkey: {
		              // Empty
		            },

		            withoutKey: {
		              handler: function(player, options, event) {
		                  console.log('withoutKey handler');
		              }
		            },

		            withoutHandler: {
		              key: function(e) {
		                  return true;
		              }
		            },

		            malformedKey: {
		              key: function() {
		                console.log('I have a malformed customKey. The Key function must return a boolean.');
		              },
		              handler: function(player, options, event) {
		                //Empty
		              }
		            }
		          }
		        });
		      });
		    </script>
		    <!--FIN SCRIPT PARA LOS ACCESOS RAPIDO DEL TECLADO EN EL REPRODUCTOR-->

		    <!--SUGERENCIAS DE MAS VIDEOS DE LA MISMA CARPETA-->
			<div class="listado">
				<div class="row__inner">
					<?php
						//¿El video tiene su propia miniatura?
			           	$miniatura = obtenerMiniatura($carpetas[$dir]);

			          	if ($miniatura == ""){
			              $miniatura = "img/miniatura_default.png";
			            }

						for ($j = 0; $j < sizeof($videos); $j++){
			            //Vamos imprimiendo cada video en sus listas
			            echo "<div class='tile'>";
		        			echo "<div class='tile__media'>";
					            echo "<div class='contenedor'>";
						            echo "<img title='tile__img' src='".$miniatura."' id=miniatura alt='".$carpetas[$dir]."'></a> ";
						            echo "<a href='reproductor.php?dir=".$dir."&category=".$cat."&id=".$j."' method='post'>";
						            echo "<div class='tile__details'>";
						            	echo "<div class='tile__title'>";
						            		echo "<h2>".$videos[$j]."</h2>";
						            	echo "</div>";
						            echo "</div>";
						            echo "</a>";
						        echo "</div>";
				            echo "</div>";
			            echo "</div>";
						}
					?>
				</div>
			</div>
		</center>
	</body>
</html>