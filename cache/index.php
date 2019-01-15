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

   <link rel="stylesheet" href="css/colorbox.css">
   <link rel="stylesheet" href="css/main.css">
</head>

<body class="index">
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
  <section class="seccion contenedor">
     <h2>La mejor conferencia de diseño web en español</h2>
     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  </section>

  <section class="programa">
      <div class="contenedor-video">
          <video autoplay loop poster="img/bg-talleres.jpg">
              <source src="video/video.mp4" type="video/mp4">
              <source src="video/video.webm" type="video/webm">
              <source src="video/video.ogv" type="video/ogg">
          </video>
      </div> <!--Fin .contenedor-video-->

      <div class="contenido-programa">
          <div class="contenedor">
              <div class="programa-evento">
                  <h2>Programa del Evento</h2>

                
                <nav class="menu-programa">
                                                                    <a href="#seminarios"><i class="fa fa-university"></i>Seminarios</a>
                                                                    <a href="#conferencias"><i class="fa fa-comment"></i>Conferencias</a>
                                                                    <a href="#talleres"><i class="fa fa-code"></i>Talleres</a>
                                                                    <a href="#mentor�as"><i class="fas fa-address-card"></i>Mentorías</a>
                                    </nav>

                                                                                <div id="seminarios" class="info-curso ocultar clearfix">
                                                <div class="detalle-evento">
                                <h3>Diseño UI y UX para móviles</h3>
                                <p><i class="far fa-clock"></i>10:00:00</p>
                                <p><i class="fa fa-calendar"></i>2016-12-09</p>
                                <p><i class="fa fa-user"></i>Susan Sanchez</p>
                            </div>
                                                                                                                    <div class="detalle-evento">
                                <h3>Aprende a Programar en una mañana</h3>
                                <p><i class="far fa-clock"></i>10:00:00</p>
                                <p><i class="fa fa-calendar"></i>2016-12-10</p>
                                <p><i class="fa fa-user"></i>Gregorio Sanchez</p>
                            </div>
                                                    <a href="calendario.php" class="button float-rigth">Ver Todos</a>
                        </div> <!--#cat_evento-->
                                                                     
                                                                                                    <div id="conferencias" class="info-curso ocultar clearfix">
                                                <div class="detalle-evento">
                                <h3>Como ser freelancer</h3>
                                <p><i class="far fa-clock"></i>10:00:00</p>
                                <p><i class="fa fa-calendar"></i>2016-12-09</p>
                                <p><i class="fa fa-user"></i>Susan Sanchez</p>
                            </div>
                                                                                                                    <div class="detalle-evento">
                                <h3>Tecnologías del Futuro</h3>
                                <p><i class="far fa-clock"></i>17:00:00</p>
                                <p><i class="fa fa-calendar"></i>2016-12-09</p>
                                <p><i class="fa fa-user"></i>Rafael Bautista</p>
                            </div>
                                                    <a href="calendario.php" class="button float-rigth">Ver Todos</a>
                        </div> <!--#cat_evento-->
                                                                     
                                                                                                    <div id="talleres" class="info-curso ocultar clearfix">
                                                <div class="detalle-evento">
                                <h3>Responsive Web Design</h3>
                                <p><i class="far fa-clock"></i>10:00:00</p>
                                <p><i class="fa fa-calendar"></i>2016-12-09</p>
                                <p><i class="fa fa-user"></i>Rafael Bautista</p>
                            </div>
                                                                                                                    <div class="detalle-evento">
                                <h3>Flexbox</h3>
                                <p><i class="far fa-clock"></i>12:00:00</p>
                                <p><i class="fa fa-calendar"></i>2016-12-09</p>
                                <p><i class="fa fa-user"></i>Shari Herrera</p>
                            </div>
                                                    <a href="calendario.php" class="button float-rigth">Ver Todos</a>
                        </div> <!--#cat_evento-->
                                                                     
                                                                                                    <div id="mentor�as" class="info-curso ocultar clearfix">
                                                <div class="detalle-evento">
                                <h3>Git y Github</h3>
                                <p><i class="far fa-clock"></i>11:00:00</p>
                                <p><i class="fa fa-calendar"></i>2016-12-09</p>
                                <p><i class="fa fa-user"></i>Luis Alfredo Cortés</p>
                            </div>
                                                                                                                    <div class="detalle-evento">
                                <h3>GNU Linux</h3>
                                <p><i class="far fa-clock"></i>11:00:00</p>
                                <p><i class="fa fa-calendar"></i>2016-12-10</p>
                                <p><i class="fa fa-user"></i>Luis Alfredo Cortés</p>
                            </div>
                                                    <a href="calendario.php" class="button float-rigth">Ver Todos</a>
                        </div> <!--#cat_evento-->
                                                                     
                                    
                                        
                                   
                              </div> <!--.programa-evento-->
          </div> <!--.contenedor-->
      </div> <!--.contenido-programa-->
  </section> <!--.programa-->


<section class="seccion contenedor">
    
    <section class="invitados contenedor seccion">
        <h2>Nuestros Invitados</h2>
        <ul class="lista-invitados clearfix">
                        <li>
                    <div class="invitado">
                        <a class="invitado-info" href="#invitado1">
                            <img src="img/invitados/invitado1.jpg" alt="imagen invitado">
                            <p>Rafael Bautista</p>
                        </a>
                    </div>
                </li>
                <div style="display:none;">
                    <div class="invitado-info" id="invitado1">
                        <h2>Rafael Bautista</h2>
                        <img src="img/invitados/invitado1.jpg" alt="imagen invitado">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                            <li>
                    <div class="invitado">
                        <a class="invitado-info" href="#invitado2">
                            <img src="img/invitados/invitado2.jpg" alt="imagen invitado">
                            <p>Shari Herrera</p>
                        </a>
                    </div>
                </li>
                <div style="display:none;">
                    <div class="invitado-info" id="invitado2">
                        <h2>Shari Herrera</h2>
                        <img src="img/invitados/invitado2.jpg" alt="imagen invitado">
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                            <li>
                    <div class="invitado">
                        <a class="invitado-info" href="#invitado3">
                            <img src="img/invitados/invitado3.jpg" alt="imagen invitado">
                            <p>Gregorio Sanchez</p>
                        </a>
                    </div>
                </li>
                <div style="display:none;">
                    <div class="invitado-info" id="invitado3">
                        <h2>Gregorio Sanchez</h2>
                        <img src="img/invitados/invitado3.jpg" alt="imagen invitado">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                            <li>
                    <div class="invitado">
                        <a class="invitado-info" href="#invitado4">
                            <img src="img/invitados/invitado4.jpg" alt="imagen invitado">
                            <p>Susana Rivera</p>
                        </a>
                    </div>
                </li>
                <div style="display:none;">
                    <div class="invitado-info" id="invitado4">
                        <h2>Susana Rivera</h2>
                        <img src="img/invitados/invitado4.jpg" alt="imagen invitado">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                            <li>
                    <div class="invitado">
                        <a class="invitado-info" href="#invitado5">
                            <img src="img/invitados/invitado5.jpg" alt="imagen invitado">
                            <p>Harold Garcia</p>
                        </a>
                    </div>
                </li>
                <div style="display:none;">
                    <div class="invitado-info" id="invitado5">
                        <h2>Harold Garcia</h2>
                        <img src="img/invitados/invitado5.jpg" alt="imagen invitado">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                            <li>
                    <div class="invitado">
                        <a class="invitado-info" href="#invitado6">
                            <img src="img/invitados/invitado6.jpg" alt="imagen invitado">
                            <p>Susan Sanchez</p>
                        </a>
                    </div>
                </li>
                <div style="display:none;">
                    <div class="invitado-info" id="invitado6">
                        <h2>Susan Sanchez</h2>
                        <img src="img/invitados/invitado6.jpg" alt="imagen invitado">
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                            <li>
                    <div class="invitado">
                        <a class="invitado-info" href="#invitado7">
                            <img src="img/invitados/foto_diploma_2.jpg" alt="imagen invitado">
                            <p>Luis Alfredo Cortés</p>
                        </a>
                    </div>
                </li>
                <div style="display:none;">
                    <div class="invitado-info" id="invitado7">
                        <h2>Luis Alfredo Cortés</h2>
                        <img src="img/invitados/foto_diploma_2.jpg" alt="imagen invitado">
                        <p>mi biografia personal</p>
                    </div>
                </div>
                    </ul> <!--.lista-invitados-->
    </section> <!--.invitados-->


      </section> <!--Fin .seccion .contenedor-->
  <div class="contador parallax">
      <div class="contenedor">
          <ul class="resumen-evento clearfix">
              <li><p class="numero">0</p>Invitados</li>
              <li><p class="numero">0</p>Talleres</li>
              <li><p class="numero">0</p>Dias</li>
              <li><p class="numero">0</p>Conferencias</li>
          </ul>
      </div>
  </div> <!--.contador parallax-->

  <section class="precios seccion">
      <h2>Precios</h2>
      <div class="contenedor">
          <ul class="lista-precio clearfix">
              <li>
                  <div class="tabla-precio">
                      <h3>Pase por día</h3>
                      <p class="numero">$30</p>
                      <ul>
                          <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                          <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                          <li><i class="fas fa-check"></i>Todos los Talleres</li>
                      </ul>
                      <a href="#" class="button hollow">Comprar</a>
                  </div>
              </li>
              <li>
                  <div class="tabla-precio completo">
                      <h3>Todos los días</h3>
                      <p class="numero">$50</p>
                      <ul>
                          <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                          <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                          <li><i class="fas fa-check"></i>Todos los Talleres</li>
                      </ul>
                      <a href="#" class="button">Comprar</a>
                  </div>
              </li>
              <li>
                  <div class="tabla-precio">
                      <h3>Pase por dos días</h3>
                      <p class="numero">$45</p>
                      <ul>
                          <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                          <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                          <li><i class="fas fa-check"></i>Todos los Talleres</li>
                      </ul>
                      <a href="#" class="button hollow">Comprar</a>
                  </div> <!--.tabla-precio-->
              </li>
          </ul> <!--.lista-precio-->
      </div> <!--.contenedor-->
  </section><!--.precios-->

  <div class="mapa contenedor" id="mapa">
  </div>

  <section class="seccion">
      <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
              <blockquote cite="#">
                  <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  <footer class="info-testimonial clearfix">
                      <img src="img/testimonial.jpg" alt="imagen testimonial">
                      <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span> </cite>
                  </footer>
              </blockquote>
            </div> <!--.testimonial-->
            <div class="testimonial">
              <blockquote cite="#">
                  <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  <footer class="info-testimonial clearfix">
                      <img src="img/testimonial.jpg" alt="imagen testimonial">
                      <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                  </footer>
              </blockquote>
            </div> <!--.testimonial-->
            <div class="testimonial">
              <blockquote cite="#">
                  <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  <footer class="info-testimonial clearfix">
                      <img src="img/testimonial.jpg" alt="imagen testimonial">
                      <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span> </cite>
                  </footer>
              </blockquote>
            </div> <!--.testimonial-->
        </div> <!--.testimoniales-->
  </section>

  <div class="newsletter parallax">
      <div class="contenido contenedor">
          <p>Regístrate al newsletter:</p>
          <h3>gdlwebcam</h3>
          <a href="#mc_embed_signup" class="boton_newsletter button transparent">Registro</a>
      </div><!--.contenido-->
  </div><!--.newsletter-->

  <section class="seccion">
      <h2>Faltan</h2>
      <div class="cuenta-regresiva contenedor">
          <ul class="clearfix">
              <li><p id="dias" class="numero"></p>días</li>
              <li><p id="horas" class="numero"></p>horas</li>
              <li><p id="minutos" class="numero"></p>minutos</li>
              <li><p id="segundos" class="numero"></p>segundos</li>
          </ul>
      </div> <!--.cuenta-regresiva-->
  </section>

  <footer class="site-footer">
      <div class="contenedor clearfix">
          <div class="footer-informacion">
              <h3>Sobre <span>gdlwebcam<span></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
          <div class="ultimos-tweets">
              <h3>Últimos <span>Tweets<span></h3>
              <ul>
                <a class="twitter-timeline" data-height="300" data-theme="light" data-link-color="#fe4918" href="https://twitter.com/Alfredo_CY?ref_src=twsrc%5Etfw">Tweets by Alfredo_CY</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
          <div class="menu">
              <h3>Redes <span>Sociales<span></h3>
                  <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                  </nav>
          </div>
      </div><!--.contenedor-->
      <p class="copyright">Todos los Derechos Reservados GDLWEBCAM &copy 2016.</p>

        <!-- Begin Mailchimp Signup Form -->
        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
            /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
            We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>
        <div style="display:none;">
            <div id="mc_embed_signup">
            <form action="https://facebook.us19.list-manage.com/subscribe/post?u=17613d7969d6b768d78f6ea19&amp;id=46d57df774" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                <h2>Subscríbete al NewsLetter y no te pierdas nada de este evento</h2>
            <div class="indicates-required"><span class="asterisk">*</span> Es obligatorio</div>
            <div class="mc-field-group">
                <label for="mce-EMAIL">Correo Electrónico  <span class="asterisk">*</span>
            </label>
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
            </div>
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_17613d7969d6b768d78f6ea19_46d57df774" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="Suscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                </div>
            </form>
            </div>
            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
            <!--End mc_embed_signup-->
        </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="js/plugins.js"></script>
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>

    <!--Para evitar que choquen estilos de css entre plugins de jQuery cargamos los archivos de forma condicional-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="js/cotizador.js"></script>
  <script src="js/main.js"></script>
  
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
  <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us19.list-manage.com","uuid":"17613d7969d6b768d78f6ea19","lid":"46d57df774","uniqueMethods":true}) })</script>

