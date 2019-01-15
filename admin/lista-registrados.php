<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Personas Registradas
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los visitantes registrados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha Registro</th>
                  <th>Artículos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Total</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        try {
                            $sql = "SELECT registrados.*, regalos.nombre_regalo FROM registrados ";
                            $sql .= "JOIN regalos ";
                            $sql .= "ON registrados.regalo = regalos.id_regalo";
                            $resultado = $conn->query($sql);
                        } catch (Exception $e) {
                            echo "Error: ". $e->getMessage();
                        }

                        while($registrado = $resultado->fetch_assoc()){ ?>
                            <tr>
                                <td>
                                    <?php echo $registrado['nombre_registrado']." ".$registrado['apellido_registrado'];
                                        echo "<br>"; 
                                        $pagado = $registrado['pagado'];
                                        if($pagado){
                                            echo '<span class="badge bg-green">Pagado</span>';
                                        } else {
                                            echo '<span class="badge bg-red">No ha pagado</span>';
                                        }
                                    ?>
                                </td>
                                <td><?php echo $registrado['email_registrado']; ?></td>
                                <td><?php echo $registrado['fecha_registro']; ?></td>
                                <td>
                                    <?php
                                        $articulos = json_decode($registrado['pases_articulos'], true);
                                        $arreglo_articulo = array(
                                            'un_dia' => 'Pase un día',
                                            'pase_completo' => 'Pase completo',
                                            'dos_dias' => 'Pase dos días',
                                            'camisas' => 'Camisas',
                                            'etiquetas' => 'Etiquetas'
                                        );

                                        foreach($articulos as $llave => $articulo){
                                            echo $articulo." ".$arreglo_articulo[$llave]."<br>";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $resultado_evento = $registrado['talleres_registrados']; 
                                        $talleres = json_decode($resultado_evento);
                                        //Obtenemos un objeto de $talleres

                                        //Utilizando 'implode' todos los valores de un arreglo u objeto los coloca en una cadena, en este caso lo que deseamos obtener son los numeros que asociaremos con 'evento_id'

                                        $talleres = implode(", ", $talleres->eventos);
                                        //Creamos un arreglo asociando un indice a cada "evento_id" con la funcion "explode", esto porque tenemos una cadena de caracteres separas por comas es por eso que podemos dividir el string y creamos un arreglo eliminando las comas
                                        //Sin embargo creamos un arreglo de strings y debemos convertirlo a 'int' con la funcion "array_map" utilizando la propiedad 'intval' y asi obtener un arreglo de valores 'int' y de esta manera ahora si podremos utilizar la consulta al "evento_id" de la tabla 'eventos'
                                        $arreglo_talleres = array_map('intval', explode(", ", $talleres ));
                                        
                                        //Creamos una consulta para que pueda filtrar los campos obtenidos en la tabla de 'talleres_registrados' en 'registrados' y obtener el texto y filtrarlo en la columna de 'evento_id' de 'eventos'

                                        //Debemos iterar primeramente el $arreglo_talleres dado que debemmos obtener los valores de cada llave, en este caso los valores son los "evento_id" de cada taller que escogio el registrado
                                        foreach($arreglo_talleres as $indice => $evento_id){

                                            $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE evento_id=$evento_id";
                                            $resultado_talleres = $conn->query($sql_talleres);

                                            //Una vez que iteramos los $evento_id los podemos utilizar para consultar el resultado del SELECT con fetch_assoc() y asi mostrar los resultados de "talleres_registrados" en forma de texto segun el "evento_id"
                                            while($eventos = $resultado_talleres->fetch_assoc()){
                                            echo $eventos['nombre_evento']."_".$eventos['fecha_evento']."_".$eventos['hora_evento']. "<br>";
                                            }
                                        }
                                    ?>
                                </td>
                                <td><?php echo $registrado['nombre_regalo']; ?></td>
                                <td>$<?php echo $registrado['total_pagado']; ?></td>
                                <td>
                                    <a href="editar-registros.php?id=<?php echo $registrado['id_registrado']; ?>" class="btn bg-orange btn-flat margin">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" data-id="<?php echo $registrado['id_registrado']; ?>" data-tipo="registrado" class="btn bg-maroon btn-flat margin borrar_registro">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                        <?php } //Fin while ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha Registro</th>
                  <th>Artículos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Total</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
$conn->close();
include_once 'templates/footer.php';
?>

