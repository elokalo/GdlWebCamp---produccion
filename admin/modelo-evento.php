<?php 
require_once 'funciones/funciones.php';

if($_POST['registro']==="crear"){
    $titulo = $_POST['titulo_evento'];
    $categoria_id = $_POST['categoria_evento'];
    $invitado_id = $_POST['invitado'];
    $fecha= $_POST['fecha_evento'];
    //Formateamos la fecha como se encuentra en la BD
    $fecha_formateada = date('Y-m-d', strtotime($fecha));
    $hora = $_POST['hora_evento'];
    //Formateamos la hora como se encuentra en la BD, en formato de 24hrs
    $hora_formateada = date('H:i', strtotime($hora));
    
    try {
        $stmt = $conn->prepare("INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssii', $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $invitado_id);
        $stmt->execute();
        if($stmt->affected_rows){
        $respuesta = array(
            'respuesta' => 'exito',
            'id_evento' => $stmt->insert_id
        );
        } else {
        $respuesta = array(
            'respuesta' => 'error'
        );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: ". $e->getMessage();
    }
    die(json_encode($respuesta));
}


if($_POST['registro']==="actualizar"){

    $id_evento = $_POST['id_evento'];
    $titulo = $_POST['titulo_evento'];
    $categoria_id = $_POST['categoria_evento'];
    $invitado_id = $_POST['invitado'];
    $fecha = $_POST['fecha_evento'];
    //Formateamos la fecha como se encuentra en la BD
    $fecha_formateada = date('Y-m-d', strtotime($fecha));
    $hora = $_POST['hora_evento'];
    //Formateamos la hora como se encuentra en la BD, en formato de 24hrs
    $hora_formateada = date('H:i', strtotime($hora));
    
    try {
        $stmt = $conn->prepare("UPDATE eventos SET nombre_evento=?, fecha_evento=?, hora_evento=?, id_cat_evento=?, id_inv=?, editado=NOW() WHERE evento_id=?");
        $stmt->bind_param('sssiii', $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $invitado_id, $id_evento);
        $stmt->execute();
        if($stmt->affected_rows){
        $respuesta = array(
            'respuesta' => 'exito',
            'id_actualizado' => $id_evento
        );
        } else {
        $respuesta = array(
            'respuesta' => 'error'
        );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: ". $e->getMessage();
    }
    die(json_encode($respuesta));
}


if($_POST['registro']==="eliminar"){

    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM eventos WHERE evento_id=?");
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows){
        $respuesta = array(
            'respuesta' => 'exito',
            'id_eliminado' => $id_borrar
        );
        } else {
        $respuesta = array(
            'respuesta' => 'error'
        );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: ". $e->getMessage();
    }
    die(json_encode($respuesta));
    }

?>
