<?php 
require_once 'funciones/funciones.php';

if($_POST['registro']==="crear"){

    $nombre = $_POST['nombre_invitado'];
    $apellido = $_POST['apellido_invitado'];
    $descripcion = $_POST['descripcion'];
    
    //Al querer agregar archivos a una BD utilizamos la variable $_FILES la cual obtenemos los valores de los archivos que estamos enviando, nos manda que tipo de archivo es, su tamaño y PHP crea de forma temporal una carpeta para la lectura de ese archivo y de ahi PHP puede manipular ese archivo y enviarlo a una BD
    /*
    $respuesta = array(
        'post' => $_POST,
        'file' => $_FILES
    );
    die(json_encode($respuesta));
    */

    //Creamos una variable para guardar las imagenes de los invitados
    $directorio = "../img/invitados/";

    //Si el directorio no existe entonces este sera creado a traves de PHP
    if(!is_dir($directorio)){
        //Creamos el directorio, otorgamos los permisos '0755' para un servidor web, es decir estos archivos se podran manipular desde el servidor pero los clientes no podran manipular essos archivos, tambien sera recursivo 'true' es decir que todos los archivos de esa carpeta tengan los mismos permisos
        mkdir($directorio, 0755, true);
    }

    //Movemos los archivos de la ubicacion temporal de PHP a la ubicacion final $directorio
    if(move_uploaded_file($_FILES['imagen_invitado']['tmp_name'], $directorio . $_FILES['imagen_invitado']['name'])){
        $imagen_url = $_FILES['imagen_invitado']['name'];
        $imagen_resultado = "Se subio correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    try {
        $stmt = $conn->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES (?,?,?,?)");
        $stmt->bind_param('ssss', $nombre, $apellido, $descripcion, $imagen_url);
        $stmt->execute();
        if($stmt->affected_rows){
        $respuesta = array(
            'respuesta' => 'exito',
            'id_invitado' => $stmt->insert_id,
            'resultado_imagen' => $imagen_resultado
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

    $nombre = $_POST['nombre_invitado'];
    $apellido = $_POST['apellido_invitado'];
    $descripcion = $_POST['descripcion'];
    $id_invitado = $_POST['id_invitado'];
   
    $directorio = "../img/invitados/";

    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }

    if(move_uploaded_file($_FILES['imagen_invitado']['tmp_name'], $directorio . $_FILES['imagen_invitado']['name'])){
        $imagen_url = $_FILES['imagen_invitado']['name'];
        $imagen_resultado = "Se subio correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    try {
        //Verificamos que el campo al seleccionar la imagen exista, esto para que al enviar el formulario no elimine la imagen que ya tenemos asociada a nuestro invitado y la coloque como un espacio vacio
        if($_FILES['imagen_invitado']['size'] > 0){
            //Cuando queremos actualizar la imagen
            $stmt = $conn->prepare("UPDATE invitados SET nombre_invitado=?, apellido_invitado=?, descripcion=?, url_imagen=? WHERE invitado_id=?");
            $stmt->bind_param('ssssi', $nombre, $apellido, $descripcion, $imagen_url, $id_invitado);
        } else {
            //Cuando NO queremos actualizar la imagen
            $stmt = $conn->prepare("UPDATE invitados SET nombre_invitado=?, apellido_invitado=?, descripcion=? WHERE invitado_id=?");
            $stmt->bind_param('sssi', $nombre, $apellido, $descripcion, $id_invitado);
        }

        $stmt->execute();
        if($stmt->affected_rows){
        $respuesta = array(
            'respuesta' => 'exito',
            'id_actualizado' => $id_invitado
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
        $stmt = $conn->prepare("DELETE FROM invitados WHERE invitado_id=?");
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
