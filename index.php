<?php include_once 'includes/templates/header.php'?>

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

                <?php
                    try {
                        require_once('includes/funciones/bd_conexion.php'); 
                        $sql = " SELECT *FROM `categoria_evento`";
                        $resultado = $conn ->query($sql);
                    } catch (\Exception $e) {
                        echo $e->getMessage();
                    }
                ?>

                <nav class="menu-programa">
                    <?php 
                    while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
                        <?php $categoria = $cat['cat_evento']; ?>
                        <a href="#<?php echo strtolower($categoria); ?>"><i class="<?php echo $cat['icono']; ?>"></i><?php echo $cat['cat_evento']; ?></a>
                    <?php }?>
                </nav>

                <?php
                    //Realizando un multi Query con SQL y PHP
                    try {
                        require_once('includes/funciones/bd_conexion.php'); 
                        $sql_1 = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                        $sql_1 .= "FROM `eventos` ";
                        $sql_1 .= "INNER JOIN `categoria_evento` "; 
                        $sql_1 .= "ON eventos.id_cat_evento = categoria_evento.id_categoria "; 
                        $sql_1 .= "INNER JOIN `invitados` ";
                        $sql_1 .= "ON eventos.id_inv = invitados.invitado_id ";
                        $sql_1 .= "AND eventos.id_cat_evento=1 "; //Solo obtenemos los relacionados al id=1 que es Seminarios
                        $sql_1 .= "ORDER BY `evento_id` LIMIT 2;";//Es importante limitar el numero de registros/filas obtenidos en la consulta porque si no lo colocamos la iteracion de los registros sera de forma indefinida y no apareceran las conferencias y talleres
                        $sql_2 = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                        $sql_2 .= "FROM `eventos` ";
                        $sql_2 .= "INNER JOIN `categoria_evento` "; 
                        $sql_2 .= "ON eventos.id_cat_evento = categoria_evento.id_categoria "; 
                        $sql_2 .= "INNER JOIN `invitados` ";
                        $sql_2 .= "ON eventos.id_inv = invitados.invitado_id ";
                        $sql_2 .= "AND eventos.id_cat_evento=2 "; //Solo obtenemos los relacionados al id=2 que es Conferencias
                        $sql_2 .= "ORDER BY `evento_id` LIMIT 2; "; 
                        $sql_3 = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                        $sql_3 .= "FROM `eventos` ";
                        $sql_3 .= "INNER JOIN `categoria_evento` "; 
                        $sql_3 .= "ON eventos.id_cat_evento = categoria_evento.id_categoria "; 
                        $sql_3 .= "INNER JOIN `invitados` ";
                        $sql_3 .= "ON eventos.id_inv = invitados.invitado_id ";
                        $sql_3 .= "AND eventos.id_cat_evento=3 "; //Solo obtenemos los relacionados al id=3 que es Talleres
                        $sql_3 .= "ORDER BY `evento_id` LIMIT 2; ";
                        $sql_4 = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                        $sql_4 .= "FROM `eventos` ";
                        $sql_4 .= "INNER JOIN `categoria_evento` "; 
                        $sql_4 .= "ON eventos.id_cat_evento = categoria_evento.id_categoria "; 
                        $sql_4 .= "INNER JOIN `invitados` ";
                        $sql_4 .= "ON eventos.id_inv = invitados.invitado_id ";
                        $sql_4 .= "AND eventos.id_cat_evento=4 "; //Solo obtenemos los relacionados al id=4 que es Mentorias
                        $sql_4 .= "ORDER BY `evento_id` LIMIT 2; ";

                        $arreglo_sql=[$sql_1, $sql_2, $sql_3, $sql_4];

                    foreach($arreglo_sql as $indice => $sql): ?>
                    <?php
                        if($indice==0){ 
                            $resultado = $conn -> query($sql); //Consulta $sql_1
                            iteracion($resultado);
                        } else if ($indice==1){
                            $resultado = $conn -> query($sql); //Consulta $sql_2
                            iteracion($resultado);
                        } else if ($indice==2){
                            $resultado = $conn -> query($sql); //Consulta $sql_3
                            iteracion($resultado);
                        } else if ($indice==3){
                            $resultado = $conn -> query($sql); //Consulta $sql_4
                            iteracion($resultado);
                        }
                    ?>
                    <?php endforeach; ?>

                <?php 
                    } catch (\Exception $e) {
                        echo $e->getMessage();
                    }
                ?>
                        
                <?php 
                    function iteracion($resultado){
                    $i =0;
                    while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
                    <?php if (($i % 2)==0){ ?>
                        <div id="<?php echo strtolower($cat['cat_evento']);?>" class="info-curso ocultar clearfix">
                    <?php } //Fin del if pares?>
                            <div class="detalle-evento">
                                <h3><?php echo $cat['nombre_evento']; ?></h3>
                                <p><i class="far fa-clock"></i><?php echo $cat['hora_evento']; ?></p>
                                <p><i class="fa fa-calendar"></i><?php echo $cat['fecha_evento']; ?></p>
                                <p><i class="fa fa-user"></i><?php echo $cat['nombre_invitado']." ".$cat['apellido_invitado'];?></p>
                            </div>
                        <?php if (($i % 2)==1){ ?>
                            <a href="calendario.php" class="button float-rigth">Ver Todos</a>
                        </div> <!--#cat_evento-->
                        <?php } //Fin del if nones?>
                        <?php $i++;?>
                    <?php } //Fin while ?> 
                <?php }//Fin funcion 'iteracion' ?>                   
                <?php /* ?>
                <?php
                    //Realizando un multi Query con SQL y PHP
                    try {
                        require_once('includes/funciones/bd_conexion.php'); 
                        $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                        $sql .= "FROM `eventos` ";
                        $sql .= "INNER JOIN `categoria_evento` "; 
                        $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria "; 
                        $sql .= "INNER JOIN `invitados` ";
                        $sql .= "ON eventos.id_inv = invitados.invitado_id ";
                        $sql .= "AND eventos.id_cat_evento = 1 "; //Solo obtenemos los relacionados al id=1 que es Seminarios
                        $sql .= "ORDER BY `evento_id` LIMIT 2; ";
                        $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                        $sql .= "FROM `eventos` ";
                        $sql .= "INNER JOIN `categoria_evento` "; 
                        $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria "; 
                        $sql .= "INNER JOIN `invitados` ";
                        $sql .= "ON eventos.id_inv = invitados.invitado_id ";
                        $sql .= "AND eventos.id_cat_evento = 2 "; //Solo obtenemos los relacionados al id=2 que es Seminarios
                        $sql .= "ORDER BY `evento_id` LIMIT 2; ";
                        $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                        $sql .= "FROM `eventos` ";
                        $sql .= "INNER JOIN `categoria_evento` "; 
                        $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria "; 
                        $sql .= "INNER JOIN `invitados` ";
                        $sql .= "ON eventos.id_inv = invitados.invitado_id ";
                        $sql .= "AND eventos.id_cat_evento = 2 "; //Solo obtenemos los relacionados al id=3 que es Seminarios
                        $sql .= "ORDER BY `evento_id` LIMIT 2; ";

                    } catch (\Exception $e) {
                        echo $e->getMessage();
                    }
                ?>

                <?php $conn->multi_query($sql); ?>

                <?php 
                    do{
                        $resultado = $conn->store_result();                        
                        $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

                        <?php $i = 0;?>
                        <?php foreach ($row as $evento) { ?>
                            <?php if (($i % 2)==0){ ?>
                                <div id="<?php echo strtolower($evento['cat_evento']);?>" class="info-curso ocultar clearfix">
                            <?php } //Fin del if pares?>
                                    <div class="detalle-evento">
                                        <h3><?php echo $evento['nombre_evento']; ?></h3>
                                        <p><i class="far fa-clock"></i><?php echo $evento['hora_evento']; ?></p>
                                        <p><i class="fa fa-calendar"></i><?php echo $evento['fecha_evento']; ?></p>
                                        <p><i class="fa fa-user"></i><?php echo $evento['nombre_invitado']." ".$evento['apellido_invitado']; ?></p>
                                    </div>
                            <?php if (($i % 2)==1){ ?>
                                <a href="calendario.php" class="button float-rigth">Ver Todos</a>
                                </div> <!--#talleres-->
                            <?php } //Fin del if nones?>
                            <?php $i++;?>
                            <?php } //Fin foreach ?>
                        <?php $resultado->free(); ?>
                    <?php } while($conn->more_results() && $conn->next_result()); ?>
                    <?php */ ?>
              </div> <!--.programa-evento-->
          </div> <!--.contenedor-->
      </div> <!--.contenido-programa-->
  </section> <!--.programa-->


<?php include_once 'includes/templates/invitados.php'?>

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

  <?php include_once 'includes/templates/footer.php'?>
