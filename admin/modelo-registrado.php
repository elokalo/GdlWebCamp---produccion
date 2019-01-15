<?php 
require_once 'funciones/funciones.php';

if($_POST['registro']==="crear"){

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    //Boletos
    $boletos = $_POST['boletos'];

    //Camisas y etiquetas
    $camisas = $_POST['pedido_extra']['camisas'];
    $etiquetas = $_POST['pedido_extra']['etiquetas'];

    $pases_articulos = productos_json($boletos, $camisas, $etiquetas);

    //Eventos
    $eventos = $_POST['registro_evento'];
    $registro_eventos = eventos_json($eventos);

    $regalo = $_POST['regalo'];
    $total_pedido = $_POST['total_pedido'];

    try {
        $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado, pagado) VALUES (?, ?, ?, NOW(), ?, ?, ?, ?, 1)");
        $stmt->bind_param("sssssis", $nombre, $apellido, $email, $pases_articulos, $registro_eventos, $regalo, $total_pedido);
        $stmt->execute();
        if($stmt->affected_rows){
        $respuesta = array(
            'respuesta' => 'exito',
            'id_registro' => $stmt->insert_id
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

    $id_registro = $_POST['id_registro'];
    $fecha_registro = $_POST['fecha_registro'];
 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    //Boletos
    $boletos = $_POST['boletos'];

    //Camisas y etiquetas
    $camisas = $_POST['pedido_extra']['camisas'];
    $etiquetas = $_POST['pedido_extra']['etiquetas'];

    $pases_articulos = productos_json($boletos, $camisas, $etiquetas);

    //Eventos
    $eventos = $_POST['registro_evento'];
    $registro_eventos = eventos_json($eventos);

    $regalo = $_POST['regalo'];
    $total_pedido = $_POST['total_pedido'];
    
    try {
        $stmt = $conn->prepare("UPDATE registrados SET nombre_registrado=?, apellido_registrado=?, email_registrado=?, fecha_registro=?, pases_articulos=?, talleres_registrados=?, regalo=?, total_pagado=?, pagado=1, fecha_edicion=NOW() WHERE id_registrado=?");
        $stmt->bind_param('ssssssisi', $nombre, $apellido, $email, $fecha_registro, $pases_articulos, $registro_eventos, $regalo, $total_pedido, $id_registro);
        $stmt->execute();
        if($stmt->affected_rows){
        $respuesta = array(
            'respuesta' => 'exito',
            'id_actualizado' => $id_registro
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
        $stmt = $conn->prepare("DELETE FROM registrados WHERE id_registrado=?");
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
