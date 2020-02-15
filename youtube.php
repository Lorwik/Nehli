<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php"); ?>
		<link href="css/video-js.css" rel="stylesheet" />
		<link href="css/netflix-skin.css" rel="stylesheet" />
		<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
		<script src="js/video.js"></script>
		<script src="js/Youtube.js"></script>
	</head>
	<body>
		<div class="reproductor">
		<center>
			<form action="youtube.php" method="post">
				<input name="youtubevar" id="youtubevar" class="txtbuscar" type="text" value="" size="8" />
				<input type="submit" class="youtubebuscar" value="Buscar-URL" />
			</form>
			<br/>
			  	<video id="my-video" class="video-js vjs-big-play-centered" controls width="1280" heigh="768" poster="img/poster_youtube.png" data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "<?php echo $youtubevar = $_POST["youtubevar"]; ?>"}] }'>
				<p class="vjs-no-js">
				  Para ver este video, habilite JavaScript y considere actualizar a un navegador web que
				  <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
				</p>
			</video>
			</center>
		</div>
	</body>
</html>