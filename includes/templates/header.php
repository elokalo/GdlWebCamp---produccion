<?php
    /*CACHEAR PHP: Script de cache hace que ciertas paginas y consultas sean copiadas de forma temporal (en cache) del contenido dinamico y refrescar ese cache cada cierto tiempo y optimizar mejor el contenido de PHP de manera dinamica y tambien las consultas de MySQL*/
    // Definir un nombre para cachear
    $original = basename($_SERVER['PHP_SELF']);
    $pagina_cache = str_replace('.php', '', $original);
    // Definir archivo para cachear (puede ser .php también)
    $archivoCache = 'cache/'.$pagina_cache.'.php';
    // Cuanto tiempo deberá estar este archivo almacenado
    $tiempo = 3600;
    // Checar que el archivo exista, el tiempo sea el adecuado y muestralo
    if(file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
      include($archivoCache);
        exit;
	  }
    // Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
    ob_start();
?>
<!doctype html>
<html class="no-js" lang="">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title></title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />

   <?php 
        $archivo = basename($_SERVER['PHP_SELF']); //Obtenemos el valor de la pagina es decir el nombre del archivo por ejemplo "invitados.php"
        $pagina = str_replace(".php", "", $archivo); //Con 'str_replace' reemplazamos un string con otro a partir de una busqueda, sin embargo no lo queremos reemplazar simplemente queremos buscar el nombre del archivo con terminacion ".php", por ejemplo el $archivo obtenido "invitados.php" buscaremos lo que diga "invitados"
        if($pagina=='invitados' || $pagina=='index'){
          echo '<link rel="stylesheet" href="css/colorbox.css">';
        } else if($pagina == 'conferencia'){
          echo ' <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">';
        }
    ?>

   <link rel="stylesheet" href="css/main.css">
</head>

<body class="<?php echo $pagina;?>">
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
  <!-- Add your site or application content here -->

  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest-p"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>

        <div class="informacion-evento">
          <div class="clearfix">
            <p class="fecha"><i class="far fa-calendar-alt"></i>10-12 dic</p>
            <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Guadalajara, MX</p>
          </div>
          <h1 class="nombre-sitio">GdlWebCam</h1>
          <p class="slogan">La mejor conferencia de <span>diseño web</span></p>
        </div> <!--Fin -informacion-evento-->

      </div><!--Fin .contenido-header-->
    </div><!--Fin .hero-->
  </header>

  <div class="barra">
    <div class="contenedor clearfix">
      <div class="logo">
        <a href="index.php">
            <img src="img/logo.svg" alt="logo gdlwebcam">
        </a>
      </div>

      <div class="menu-movil"><!--Menu de sandwich-->
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav class="navegacion-principal clearfix">
        <a href="conferencia.php">Conferencia</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav>
    </div><!--Fin .contenedor-->
  </div><!--Fin .barra-->