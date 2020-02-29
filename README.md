# Nehli
Centro multimedia domestico inspirado en Netflix

**Como configurar las categorias:**

En el archivo config.php modificar el array $categoria con las categorias deseadas. Ejemplo:

*$categoria=array("Series", "Peliculas", "Anime", "Peliculas Anime", "Adultos");*

La categoria protegida por el control parental sera siempre el ultimo elemento del array

Las miniaturas deberan estar en formato Jpg, si no se incluyen tomara una por defecto

Estructura de directorio de video.

<pre>-Series<br/>
  -Serie A<br/>
    -Capitulo 1.mp4<br/>
    -Capitulo 2.mp4<br/>
    -Miniatura.jpg<br/>
  -Serie B<br/>
  -Serie C<br/>
-Peliculas<br/>
  -Pelicula A<br/>
    Pelicula.mkg<br/>
    Miniatura.jpg<br/>
  -Pelicula B<br/
  
