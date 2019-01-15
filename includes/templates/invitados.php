<section class="seccion contenedor">
    <?php
        try {
            require_once('includes/funciones/bd_conexion.php'); //La funcion 'require_once' funciona igual que 'include_once' ya que hacemos un llamado a un archivo y de esta manera creamos la conexion con la BD
            $sql = " SELECT * FROM `invitados`";
            $resultado = $conn ->query($sql); //Con la funcion 'query' de PHP ejecutamos la consulta de SQL que declaramos en una variable $sql
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    ?>

    <section class="invitados contenedor seccion">
        <h2>Nuestros Invitados</h2>
        <ul class="lista-invitados clearfix">
        <?php 
            while($invitados = $resultado->fetch_assoc()){ ?>
                <li>
                    <div class="invitado">
                        <a class="invitado-info" href="#invitado<?php echo $invitados['invitado_id'];?>">
                            <img src="img/invitados/<?php echo $invitados['url_imagen'];?>" alt="imagen invitado">
                            <p><?php echo $invitados['nombre_invitado']." ".$invitados['apellido_invitado']; ?></p>
                        </a>
                    </div>
                </li>
                <div style="display:none;">
                    <div class="invitado-info" id="invitado<?php echo $invitados['invitado_id'];?>">
                        <h2><?php echo $invitados['nombre_invitado']." ".$invitados['apellido_invitado'] ?></h2>
                        <img src="img/invitados/<?php echo $invitados['url_imagen']?>" alt="imagen invitado">
                        <p><?php echo $invitados['descripcion'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </ul> <!--.lista-invitados-->
    </section> <!--.invitados-->


    <?php 
        $conn->close(); //Cerramos la conexion, siempre debemos cerrar la conexion
    ?>
  </section> <!--Fin .seccion .contenedor-->