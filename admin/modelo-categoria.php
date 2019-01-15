<?php 
require_once 'funciones/funciones.php';

if($_POST['registro']==="crear"){
    
    $categoria = $_POST['categoria'];
    $icono = $_POST['icono'];

    try {
        $stmt = $conn->prepare("INSERT INTO categoria_evento (cat_evento, icono) VALUES (?,?)");
        $stmt->bind_param('ss', $categoria, $icono);
        $stmt->execute();
        if($stmt->affected_rows){
        $respuesta = array(
            'respuesta' => 'exito',
            'id_categoria' => $stmt->insert_id
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

    $categoria = $_POST['categoria'];
    $icono = $_POST['icono'];
    $id_categoria = $_POST['id_categoria'];
    
    try {
        $stmt = $conn->prepare("UPDATE categoria_evento SET cat_evento=?, icono=?, editado=NOW() WHERE id_categoria=?");
        $stmt->bind_param('ssi', $categoria, $icono, $id_categoria);
        $stmt->execute();
        if($stmt->affected_rows){
        $respuesta = array(
            'respuesta' => 'exito',
            'id_actualizado' => $id_categoria
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
        $stmt = $conn->prepare("DELETE FROM categoria_evento WHERE id_categoria=?");
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
