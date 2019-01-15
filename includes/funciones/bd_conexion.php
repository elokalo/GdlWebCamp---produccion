<?php 
    $conn = new mysqli('localhost', 'root', 'root11', 'gdlwebcamp');
    //Con este if podemos consultar si existio algun error al conectar con la base de datos, en este caso 'gdlwebcamp'
    $conn->set_charset("utf8"); 
    if($conn->connect_error){
        echo $error -> $conn->$connect_error;
    }
?>