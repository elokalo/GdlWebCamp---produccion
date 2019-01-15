<?php if(isset($_POST['submit'])): 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];    
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    date_default_timezone_set('America/Mexico_City');
    $fecha = date('Y-m-d H:i:s');
    //Pedidos
    $boletos = $_POST['boletos'];
    $camisas = $_POST['pedido_camisas'];
    $etiquetas = $_POST['pedido_etiquetas'];
    include_once 'includes/funciones/funciones.php';
    $pedido = productos_json($boletos, $camisas, $etiquetas);
    //Eventos
    $eventos = $_POST['registro'];
    $registro = eventos_json($eventos);
    try {
        require_once('includes/funciones/bd_conexion.php');
        if($stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)")){ //Utilizamos un 'Prepared Statement' para insertar valores en la BD, en la parte de 'prepare' le estamos informando a la BD que se prepare para ejecutar la consulta de SQL.
        //El 'Prepared Statement' nos otorga segurdidad para evitar MySQL insertion es decir que metan datos corrutps a nuestra BD
        $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total); //Para insertar los registros a nuestra BD utilizamos POO (->) en PHP con la funcion "bind_param", aqui debemos asegurarnos a que tipo de dato corresponde, el unico que sera 'int (s)' como tal seria la variable $regalo que es la que se asociara con el campo/columna de 'regalo' de la tabla 'registrados', los otros campos/columnas son strings es por eso que se colocaron 7 's' y solo una 'i' de int
        $stmt->execute();
        $stmt->close(); //Prevenimos insercion de SQL
        $conn->close(); //Cerramos la conexion para evitar que un exceso de conexiones tumben el servidor
        } else {
            //Esto nos ayuda a verificar la conexion ademas de darnos ayuda
            $error = $conn->error . ' ' . $conn->error;
            echo $error;
        }
        //NOTA IMPORTANTE: Para asegurarnos de que no tengamos registros repetidos al recargar esta pagina "validar_registro.php" debemos colocar todo nuestro codigo al inicio, antes de cargar todo el "header.php" antes de cargar el HTML en si. Una vez hecho eso utilizamos la funcion "header("Location:")" donde dentro de "Location:" colocaremos la pagina a la cual se redireccionara al terminar nuestro registro utilizando propiedades del metodo GET (?) aseguramos que no existan registros duplicados.
        header('Location: validar_registro.php?exitoso=1'); 
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
?>
<?php endif; ?>



<?php include_once 'includes/templates/header.php'; /*?>

<section class="seccion contenedor">
      <h2>Resúmen del Registro</h2>

      <?php if(isset($_GET['exitoso'])){
          if($_GET['exitoso']==1){
              echo "<h3>Registro Exitoso</h3>";
          }
      } ?>

</section>

<?php */ include_once 'includes/templates/footer.php'; ?>