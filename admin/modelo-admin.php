<?php 
require_once 'funciones/funciones.php';

//if(isset($_POST['registro'])){
  if($_POST['registro']==="crear"){

    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $nivel = $_POST['nivel'];

    $opciones =array(
      'cost' => 12
    );

    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

    try {
      $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password, nivel) VALUES (?,?,?,?)");
      $stmt->bind_param('sssi', $usuario, $nombre, $password_hashed, $nivel);
      $stmt->execute();
      if($stmt->affected_rows){
        $respuesta = array(
          'respuesta' => 'exito',
          'id_admin' => $stmt->insert_id
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

    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $id_admin = $_POST['id_admin'];

    $opciones =array(
      'cost' => 12
    );

    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $opciones);

    try {
      //Verificamos que el campo de 'password' no este vacio, si esta vacio no actualiza el password, para que no quede como campo vacio, en caso de que no queramos editar el password
      if(empty($_POST['password'])){
        $stmt = $conn->prepare("UPDATE admins SET usuario=?, nombre=?, editado=NOW() WHERE id_admin=?");
        $stmt->bind_param('ssi', $usuario, $nombre, $id_admin);
      } else {
        $stmt = $conn->prepare("UPDATE admins SET usuario=?, nombre=?, password=?, editado=NOW() WHERE id_admin=?");
        $stmt->bind_param('sssi', $usuario, $nombre, $hashed_password, $id_admin);
      }
      $stmt->execute();
      if($stmt->affected_rows){
        $respuesta = array(
          'respuesta' => 'exito',
          'id_actualizado' => $id_admin
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
    $id_borrar =$_POST['id'];

    try {
      $stmt = $conn->prepare("DELETE FROM admins WHERE id_admin=?");
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
//} //Fin if 'registro'

?>