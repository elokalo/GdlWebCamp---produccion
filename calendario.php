<?php include_once 'includes/templates/header.php'?>

  <section class="seccion contenedor">
    <h2>Calendario de Eventos</h2>

    <?php
        try {
            require_once('includes/funciones/bd_conexion.php'); //La funcion 'require_once' funciona igual que 'include_once' ya que hacemos un llamado a un archivo y de esta manera creamos la conexion con la BD
            $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento,  icono, nombre_invitado, apellido_invitado ";
            $sql .= " FROM eventos ";
            $sql .= " INNER JOIN categoria_evento "; //INNER JOIN hace referencia que vamos a obtener campos a partir de la tabla 'categoria_evento'
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria "; //De la tabla de "eventos" y de la tabla "categoria_evento" verificamos que en la tabla de "eventos" el campo "id_cat_evento" tenga los mismo valores/registros que la el campo "id_categoria" de la tabla "categoria_evento"
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id";
            $sql .= " ORDER BY `evento_id`"; //Ordenamos el arreglo a partir del campo/columna "evento_id"
            $resultado = $conn ->query($sql); //Con la funcion 'query' de PHP ejecutamos la consulta de SQL que declaramos en una variable $sql
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    ?>

    <div class="calendario">
        <?php 
        //La funcion 'fetch_assoc' imprime los resultados asociados a una consulta de SQL; tambien asocia los campos (columnas) de la tabla 'eventos' y los convierte en arrays asociativos
            $calendario = array(); //Este arreglo obtendra los elementos del arreglo $evento, es decir sera un arreglo multidimensional y a la vez asociativo
            while($eventos = $resultado->fetch_assoc()){ 

                //Obtiene la fecha del evento
                $fecha = $eventos['fecha_evento']; 

                //Una vez que obtenemos los datos en forma de arreglo con la funcion "fetch_assoc" comenzamos a iterar los elementos del arreglo en arreglos mas pequeños en $evento

                $evento = array(
                    'titulo' => $eventos['nombre_evento'],
                    'fecha' => $eventos['fecha_evento'],
                    'hora' => $eventos['hora_evento'],
                    'categoria' => $eventos['cat_evento'],
                    'icono' => ($eventos['icono']),
                    'invitado' => $eventos['nombre_invitado']." ". $eventos['apellido_invitado'] 
                ); 
                
                $calendario[$fecha][] = $evento; //Cuando ya asociamos los elementos en el arreglo $evento, entonces comenzamos a insertar en el arreglo $calendario comenzamos a ordenar los arreglos en este caso segun su $fecha, dentro de cada 'fecha_evento' (que son 3) tendremos los arreglos asociados a esas fechas y de esa manera se utilizaran los datos
                ?>
                
            <?php } //while de fetch_assoc() ?>

            <?php 
                //Imprime todos los eventos
                //"$dia" hace referencia a las llaves del arreglo multidimensional "$calendario" y como valores de esas llaves es "$lista_eventos"
                foreach($calendario as $dia => $lista_eventos){ ?>
                    <h3>
                        <i class="fa fa-calendar"></i>
                        <?php
                        //Unix (Linux y Mac)
                        setlocale(LC_TIME,'es_ES.UTF-8'); 
                        
                        //Windows
                        setlocale(LC_TIME, 'spanish'); //Convertimos el formato de fecha que por default esta en ingles a un formato en español
                        
                        //Con 'utf8_encode' aseguramos que aceptes las tildes, mayusculas y 'ñ' del lenguaje español latino
                        echo utf8_encode((strftime("%A, %d de %B del %Y", strtotime($dia)))); //La funcion 'strtotime()' convertimos un String a Fecha y con la funcion 'strftime' obtendremos el formato de esa fecha que en este caso %A es el dia de la semana, %b es el dia del mes, %B es el mes y %Y es el año?>
                    </h3>

                    <?php
                        //Ahora hacemos una iteracion de los valores de cada array hecho por cada '$dia', como estamos entro de otra iteracion no es necesario hacer uno de cada '$dia' (que son 3 dias) si no que simplementa asociamos la palabra "$lista_eventos" que son los valores del arreglo padre $calendario
                        foreach($lista_eventos as $evento){?>
                            <div class="dia">
                                <p class="titulo"><?php echo $evento['titulo'];?></p>
                                <p class="hora">
                                    <i class="far fa-clock" aria-hidden="true"></i>
                                    <?php echo $evento['fecha']. " ". $evento['hora'];?>
                                </p>
                                <p class="categoria">
                                    <i class="<?php echo $evento['icono'];?>" aria-hidden="true"></i>
                                    <?php echo $evento['categoria'];?>
                                </p>
                                <p class="invitado">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <?php echo $evento['invitado'];?>
                                </p>
                            </div> <!--Fin .dia-->

                    <?php }//Fin foreach 'eventos' ?>
               <?php } //Fin foreach 'de dias'?>
       
    </div> <!--Fin .calendario-->

    <?php 
        $conn->close(); //Cerramos la conexion, siempre debemos cerrar la conexion
    ?>
  </section>

<?php include_once 'includes/templates/footer.php'?>