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

   
   <link rel="stylesheet" href="css/main.css">
</head>

<body class="registro">
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
      <h2>Registro de Usuarios</h2>
      <form id="registro" class="registro" action="pagar.php" method="POST">
          <div id="datos_usuario" class="registro caja clearfix">
              <div class="campo">
                  <label for="nombre">Nombre:</label>
                  <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre">
              </div>
              <div class="campo">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido">
            </div>
            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Tu Email">
            </div>
            <div id="error"></div>
          </div> <!--#datos_usuario-->

          <div id="paquetes" class="paquetes" >
            <h3>Elige el número de boletos</h3>
            <ul class="lista-precio clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por día (Viernes)</h3>
                        <p class="numero">$30</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                            <li><i class="fas fa-check"></i>Todos los Talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_dia">Boletos deseados</label>
                            <input type="number" id="pase_dia" name="boletos[un_dia][cantidad]" min="0" size="3" placeholder="0">
                            <input type="hidden" value="30" name="boletos[un_dia][precio]">
                        </div>
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
                        <div class="orden">
                            <label for="pase_completo">Boletos deseados</label>
                            <input type="number" id="pase_completo" name="boletos[pase_completo][cantidad]" min="0" size="3" placeholder="0">
                            <input type="hidden" value="50" name="boletos[pase_completo][precio]">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por dos días (Viernes y Sábado)</h3>
                        <p class="numero">$45</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                            <li><i class="fas fa-check"></i>Todos los Talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_dosdias">Boletos deseados</label>
                            <input type="number" id="pase_dosdias" name="boletos[dos_dias][cantidad]" min="0" size="3" placeholder="0">
                            <input type="hidden" value="45" name="boletos[dos_dias][precio]">
                        </div>
                    </div> <!--.tabla-precio-->
                </li>
            </ul> <!--.lista-precio-->
          </div> <!--#paquetes-->

          <div id="eventos" class="eventos clearfix">
              <h3>Elige tus Talleres</h3>
              <div class="caja">
              
                                  <div id="viernes" class="contenido-dia clearfix">
                      <h4>viernes</h4>

                                                    <div>
                                <p>Seminarios</p>
                                
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="9" value="9">
                                        <time>
                                        10:00                                        </time> Diseño UI y UX para móviles                                        <br>
                                        <span class="autor">Susan Sanchez</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="34" value="34">
                                        <time>
                                        13:00                                        </time> SQL Avanzado                                        <br>
                                        <span class="autor">Shari Herrera</span>
                                    </label>
                                                            </div>
                                                    <div>
                                <p>Conferencias</p>
                                
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="6" value="6">
                                        <time>
                                        10:00                                        </time> Como ser freelancer                                        <br>
                                        <span class="autor">Susan Sanchez</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="7" value="7">
                                        <time>
                                        17:00                                        </time> Tecnologías del Futuro                                        <br>
                                        <span class="autor">Rafael Bautista</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="8" value="8">
                                        <time>
                                        19:00                                        </time> Seguridad en la Web                                        <br>
                                        <span class="autor">Shari Herrera</span>
                                    </label>
                                                            </div>
                                                    <div>
                                <p>Talleres</p>
                                
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="1" value="1">
                                        <time>
                                        10:00                                        </time> Responsive Web Design                                        <br>
                                        <span class="autor">Rafael Bautista</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="2" value="2">
                                        <time>
                                        12:00                                        </time> Flexbox                                        <br>
                                        <span class="autor">Shari Herrera</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="3" value="3">
                                        <time>
                                        14:00                                        </time> HTML5 y CSS3                                        <br>
                                        <span class="autor">Gregorio Sanchez</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="4" value="4">
                                        <time>
                                        17:00                                        </time> Drupal                                        <br>
                                        <span class="autor">Susana Rivera</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="5" value="5">
                                        <time>
                                        19:00                                        </time> WordPress                                        <br>
                                        <span class="autor">Harold Garcia</span>
                                    </label>
                                                            </div>
                                                    <div>
                                <p>Mentorías</p>
                                
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="35" value="35">
                                        <time>
                                        11:00                                        </time> Git y Github                                        <br>
                                        <span class="autor">Luis Alfredo Cortés</span>
                                    </label>
                                                            </div>
                                          </div> <!--.contenido-dia-->
                                    <div id="sabado" class="contenido-dia clearfix">
                      <h4>sábado</h4>

                                                    <div>
                                <p>Seminarios</p>
                                
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="19" value="19">
                                        <time>
                                        10:00                                        </time> Aprende a Programar en una mañana                                        <br>
                                        <span class="autor">Gregorio Sanchez</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="20" value="20">
                                        <time>
                                        17:00                                        </time> Diseño UI y UX para móviles                                        <br>
                                        <span class="autor">Harold Garcia</span>
                                    </label>
                                                            </div>
                                                    <div>
                                <p>Conferencias</p>
                                
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="16" value="16">
                                        <time>
                                        10:00                                        </time> Como crear una tienda online que venda millones en pocos dí­as                                        <br>
                                        <span class="autor">Susan Sanchez</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="17" value="17">
                                        <time>
                                        17:00                                        </time> Los mejores lugares para encontrar trabajo                                        <br>
                                        <span class="autor">Rafael Bautista</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="18" value="18">
                                        <time>
                                        19:00                                        </time> Pasos para crear un negocio rentable                                         <br>
                                        <span class="autor">Shari Herrera</span>
                                    </label>
                                                            </div>
                                                    <div>
                                <p>Talleres</p>
                                
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="10" value="10">
                                        <time>
                                        10:00                                        </time> AngularJS                                        <br>
                                        <span class="autor">Rafael Bautista</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="11" value="11">
                                        <time>
                                        12:00                                        </time> PHP y MySQL                                        <br>
                                        <span class="autor">Shari Herrera</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="12" value="12">
                                        <time>
                                        14:00                                        </time> JavaScript Avanzado                                        <br>
                                        <span class="autor">Gregorio Sanchez</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="13" value="13">
                                        <time>
                                        17:00                                        </time> SEO en Google                                        <br>
                                        <span class="autor">Susana Rivera</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="14" value="14">
                                        <time>
                                        19:00                                        </time> De Photoshop a HTML5 y CSS3                                        <br>
                                        <span class="autor">Harold Garcia</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="15" value="15">
                                        <time>
                                        21:00                                        </time> PHP Intermedio y Avanzado                                        <br>
                                        <span class="autor">Susan Sanchez</span>
                                    </label>
                                                            </div>
                                                    <div>
                                <p>Mentorías</p>
                                
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="36" value="36">
                                        <time>
                                        11:00                                        </time> GNU Linux                                        <br>
                                        <span class="autor">Luis Alfredo Cortés</span>
                                    </label>
                                                            </div>
                                          </div> <!--.contenido-dia-->
                                    <div id="domingo" class="contenido-dia clearfix">
                      <h4>domingo</h4>

                                                    <div>
                                <p>Seminarios</p>
                                
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="29" value="29">
                                        <time>
                                        10:00                                        </time> Creando una App en Android en una mañana                                        <br>
                                        <span class="autor">Susana Rivera</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="30" value="30">
                                        <time>
                                        17:00                                        </time> Creando una App en iOS en una tarde                                        <br>
                                        <span class="autor">Rafael Bautista</span>
                                    </label>
                                                            </div>
                                                    <div>
                                <p>Conferencias</p>
                                
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="26" value="26">
                                        <time>
                                        10:00                                        </time> Como hacer Marketing en línea                                        <br>
                                        <span class="autor">Susan Sanchez</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="27" value="27">
                                        <time>
                                        17:00                                        </time> ¿Con que lenguaje debo empezar?                                        <br>
                                        <span class="autor">Shari Herrera</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="28" value="28">
                                        <time>
                                        19:00                                        </time> Frameworks y librerias Open Source                                        <br>
                                        <span class="autor">Gregorio Sanchez</span>
                                    </label>
                                                            </div>
                                                    <div>
                                <p>Talleres</p>
                                
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="21" value="21">
                                        <time>
                                        10:00                                        </time> Laravel                                        <br>
                                        <span class="autor">Rafael Bautista</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="22" value="22">
                                        <time>
                                        12:00                                        </time> Crea tu propia API                                        <br>
                                        <span class="autor">Shari Herrera</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="31" value="31">
                                        <time>
                                        12:00                                        </time> Angular 5                                        <br>
                                        <span class="autor">Harold Garcia</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="23" value="23">
                                        <time>
                                        14:00                                        </time> JavaScript y jQuery                                        <br>
                                        <span class="autor">Gregorio Sanchez</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="24" value="24">
                                        <time>
                                        17:00                                        </time> Creando Plantillas para WordPress                                        <br>
                                        <span class="autor">Susana Rivera</span>
                                    </label>
                                                                    <label>
                                        <input type="checkbox" name="registro[]" id="25" value="25">
                                        <time>
                                        19:00                                        </time> Tiendas Virtuales en Magento                                        <br>
                                        <span class="autor">Harold Garcia</span>
                                    </label>
                                                            </div>
                                          </div> <!--.contenido-dia-->
                                </div> <!--.caja-->
          </div> <!--#eventos-->

          <div id="resumen" class="resumen clearfix">
            <h3>Pago y Extras</h3>
            <div class="caja clearfix">
                <div class="extras">
                    <div class="orden">
                        <label for="camisa_evento">Camisa del evento $10 <small>(promocion 7% dto.)</small></label>
                        <input type="number" min="0" id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3" placeholder="0">
                        <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                    </div> <!--.orden-->
                    <div class="orden">
                            <label for="etiquetas">Paquete 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript, Chrome)</small></label>
                            <input type="number" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3" placeholder="0">
                            <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                    </div> <!--.orden-->
                    <div class="orden">
                            <label for="regalo">Seleccione un regalo</label><br>
                            <select id="regalo" name="regalo" required>
                                <option value="">-Seleccione un regalo-</option>
                                <option value="1">Pulseras</option>
                                <option value="2">Etiquetas</option>
                                <option value="3">Plumas</option>
                            </select>
                    </div> <!--.orden-->
                    <input type="button" id="calcular" class="button" value="calcular">
                </div> <!--.extras-->
                <div class="total">
                    <p>Resumen:</p>
                    <div id="lista-productos">

                    </div>
                    <p>Total:</p>
                    <div id="suma-total">

                    </div>
                    <input type="hidden" name="total_pedido" id="total_pedido">
                    <input type="submit" id="btnRegistro" name="submit" class="button" value="pagar">
                </div> <!--.total-->
            </div> <!--.caja-->
          </div> <!--#resumen-->
      </form>
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
    
    <script src="js/cotizador.js"></script>
  <script src="js/main.js"></script>
  
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
  <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us19.list-manage.com","uuid":"17613d7969d6b768d78f6ea19","lid":"46d57df774","uniqueMethods":true}) })</script>

