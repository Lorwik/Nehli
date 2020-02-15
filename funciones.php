<?php 

  //Comprueba que navegador utiliza y si no esta dentro de los compatibles se le avisa
  function getBrowser(){
  $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if(strpos($user_agent, 'Edg') == FALSE) //Microsoft Edge
      return '<div class="alertanavegador">¡ATENCION: El navegador desde el que accedes no es compatible con Nehli y podria no funcionar correctamente!. Se recomienda utilizar Microsoft Edge en su ultima versión. <a href="https://www.microsoft.com/en-us/edge?form=MO12GC&OCID=MO12GC">Descargalo aquí.</a></div>';
  }
 
//Lista todos los directorios y obtiene todos los archivos de video
  function obtenerListadoDeCarpetas($directorio,  &$carpetas){
    //¿Hemos recibido la ruta de un directorio?
    if (is_dir($directorio)) {
      //Si es asi lo abrimos
      if ($dh = opendir($directorio)) {
        //Recorremos todos los archivos
        while (($file = readdir($dh)) !== false) {
          //¿Es una carpeta?
          if (is_dir($directorio.$file) && $file!="." && $file!=".."){
            //solo si el archivo es una carpeta y distinto que "." y ".." y lo añadimos al array de carpetas
            $carpetaslist[] = $directorio.$file;
          }
        }
        closedir($dh);
      }

      //Ya tenemos la lista de todas las carpetas, ahora vamos a ir descartando las que no tienen archivo de video.
      for ($i = 0; $i < sizeof($carpetaslist); $i++){
        //Abrimos el directorio
        if ($dh = opendir($carpetaslist[$i])) {
          $videoencontrado = 0; //Bandera que nos marcara si encontro un archivo de video
          //Recorremos todos los archivos
          while (($file = readdir($dh)) !== false) {
            //¿El archivo actual es uno de video?
            if ((substr($file, -4) == ".mkv") || (substr($file, -4) == ".mp4") || (substr($file, -4) == ".avi") || (substr($file, -4) == ".wmv") || (substr($file, -4) == ".webm")){
              //Si ya encontramos antes un archivo de video no hace falta anotarlo mas en el array
              if ($videoencontrado == 0) {
                $carpetas[] = $carpetaslist[$i];
                $videoencontrado = 1;
              }
            }
          }
        }
      }
    }else
      echo "<br>La ruta valida no es valida.";
  }

//Funcion para obtener la lista de videos de un directorio
function obtenerListadoDeVideos($directorio,  &$videos){
  //¿Hemos recibido la ruta de un directorio?
  if (is_dir($directorio)) {
    //Si es asi lo abrimos
    if ($dh = opendir($directorio)) {
      //Recorremos todos los archivos
      while (($file = readdir($dh)) !== false) {
        //¿El archivo actual es uno de video?

        if ((substr($file, -4) == ".mkv") || (substr($file, -4) == ".mp4") || (substr($file, -4) == ".avi") || (substr($file, -4) == ".wmv") || (substr($file, -4) == ".webm")){
          $videos[] = $file;
        }
      }
      closedir($dh);
    }
  }
}  

//Function que busca en el directorio recibido por parametro si existe un archivo de imagen jpg
function obtenerMiniatura($directorio){
  if ($dh = opendir($directorio)) {
    while (($file = readdir($dh)) !== false) {
      if ((substr($file, -4) == ".jpg")){
        return $directorio."/".$file;
      }
    }
  }
  closedir($dh);
}

  //Metodo que recibe el nombre de un archivo y comprueba su extension para
  //devolver que fuente le corresponde
function TipoDeFuente($file, &$source){
  $extension = pathinfo($file, PATHINFO_EXTENSION);
  switch ($extension) {
    case 'mkv':
      $source = "video/mp4";
      break;
      
    case 'mp4':
      $source = "video/mp4";
      break;

    case 'avi':
      $source = "video/avi";
      break;

    case 'wmv':
      $source = "video/wmv";
      break;

    case 'ogg':
      $source = "video/ogg";
      break;

    case 'webm':
      $source = "video/webm";
      break;

    default:
      $source = "video/mp4";
      break;
  }
}

?>
